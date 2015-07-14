/*
*TRGGER PARA VALIDAR QUE LA CANTIDAD INTRODUCIDA EN DETALLE EXISTA EN REPUESTO
*/

create or replace function validar_existencia() returns trigger as $body$
declare
	precio decimal(8,2);
	imeiaux integer;
	fecharecibido date;
	cantidadaux integer;
	estado boolean;
begin
	precio = 0;
	imeiaux = (select count(*) from factura where (new.imei = factura.imei) and (new.fecha_rec = factura.fecha_recibido));
	estado = true;
	estado = (select detalle.activo from detalle where (new.imei=detalle.imei) and (new.fecha_rec=detalle.fecha_rec) and (new.codigo_rep = detalle.codigo_rep));

	if(new.activo = true) then
			if (imeiaux=0) then
					
					if (tg_op='UPDATE') then

						if(estado<>true) then	
							RAISE EXCEPTION 'No puede actualizar un detalle que no existe';
						end if;	

							cantidadaux = (select detalle.cantidad from detalle where (new.imei=detalle.imei) and (new.fecha_rec=detalle.fecha_rec) and (new.codigo_rep = detalle.codigo_rep));
								
								if(cantidadaux >= new.cantidad) then
									update repuesto
									set cantidad = cantidad + (cantidadaux - new.cantidad)
									where codigo = new.codigo_rep;
								else

									if((select cantidad from repuesto where new.codigo_rep=repuesto.codigo)>=(new.cantidad - cantidadaux)) then
											update repuesto
											set cantidad = cantidad - (new.cantidad - cantidadaux) 
											where codigo = new.codigo_rep;
									else
										RAISE EXCEPTION 'La cantidad que introdujo es mayor a la cantidad en existencia';
									end if;

								end if;
					else

						if (new.cantidad > (select cantidad from repuesto where new.codigo_rep=repuesto.codigo)) then
							RAISE EXCEPTION 'La cantidad que introdujo es mayor a la cantidad en existencia';
						else
							update repuesto
								set cantidad = cantidad - new.cantidad
								where codigo = new.codigo_rep;
						end if;

					end if;


							precio = (select precio_unitario from repuesto where (new.codigo_rep=codigo));
							new.costo = 0;
							new.costo = new.cantidad * precio;
							return new;
			else
				if(tg_op='UPDATE') then

					RAISE EXCEPTION 'No puede actualizar un detalle de una reparación facturada';			
				else

					RAISE EXCEPTION 'No puede insertar un detalle de una reparación facturada';
				end if;	
			end if;
	else
		RAISE EXCEPTION 'No puede insertar un detalle con estado inactivo';
	end if;			
end;
$body$
language 'plpgsql';

create trigger validar_existencia
	before insert or update on detalle
	for each row
	execute procedure validar_existencia();

/*
*TRIGGER PARA ACTUALIZAR EN ATRIBUTO COSTO EN LA TABLA FACTURA
*/

create or replace function actualizar_costo_factura() returns trigger as $body$
declare
begin

	if(tg_op='INSERT') then
		new.monto_total = 0;
		new.monto_total = 1.3*((select SUM(detalle.costo) from detalle where (new.imei=detalle.imei) and (new.fecha_recibido=detalle.fecha_rec)));
		return new;
	else
		RAISE EXCEPTION 'No puede actualizar una factura generada anteriormente';
	end if;
end;
$body$
language'plpgsql';

create trigger actualizar_costo_factura
	before  insert or update on factura
	for each row
	execute procedure actualizar_costo_factura();	

/*
*TRIGGERS PARA QUE NO SE PUEDA ELIMINAR EN NINGUNA TABLA
*/
/*
create or replace function eliminar() returns trigger as $body$
begin
	RAISE EXCEPTION 'Usted no tiene permisos para eliminar';
end;
$body$
language 'plpgsql';

create trigger eliminar_cliente
	before delete on cliente
	for each row
	execute procedure eliminar();

create trigger eliminar_dispositivo
	before delete on dispositivo
	for each row
	execute procedure eliminar();

create trigger eliminar_reparacion
	before delete on reparacion
	for each row
	execute procedure eliminar();

create trigger eliminar_tecnico
	before delete on tecnico
	for each row
	execute procedure eliminar();

create trigger eliminar_factura
	before delete on factura
	for each row
	execute procedure eliminar();

create trigger eliminar_detalles
	before delete on detalle
	for each row
	execute procedure eliminar();

create trigger eliminar_repuesto
	before delete on repuesto
	for each row
	execute procedure eliminar();*/