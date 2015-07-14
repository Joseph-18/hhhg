	create domain tcosto decimal(10,2)
	default 0
	check (value >=0);

create domain tactivo boolean
	default true;

create domain email varchar(60)
	check (((value)::text ~ '^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})+$'::text));

create domain ttel bigint
	check (value between 04120000000 and 04129999999 or value between 04140000000 and 04149999999 or value between 04160000000 and 04169999999 or value between 04260000000 and 04269999999 or value between 04240000000 and 04249999999);

create domain tcedula integer
	check (value between 1000000 and 40000000);
	
create table cliente(
	cedula tcedula not null,
	nombre varchar(50) not null,
	apellido varchar(50) not null,
	direccion varchar(75) not null,
	email email not null,
	telefono ttel not null,
	activo tactivo,
	primary key(cedula));

create table dispositivo(
	imei varchar(15) not null,
	marca varchar(20) not null,
	modelo varchar(30) not null,
	descripcion varchar(250) default '',
	ced_cli tcedula not null,
	activo tactivo,
	primary key(imei),
	foreign	key(ced_cli) references cliente(cedula));

create table tecnico(
	cedula tcedula not null,
	nombre varchar(50) not null,
	apellido varchar(50) not null,
	telefono ttel,
	pass varchar(60),
	activo tactivo,
	primary key(cedula));

create table repuesto (
	codigo varchar(10) not null,
	nombre varchar(50) not null,
	descripcion varchar (250),
	cantidad integer not null,
	precio_unitario tcosto not null,
	activo tactivo,
	primary key (codigo));

create table reparacion(
	imei varchar(15) not null,
	fecha_recibido date not null,
	descripcion varchar(250),
	estado varchar(25) default 'EN PROCESO',
	observacion varchar(250) default '',
	historia text default '',
	cedula_tecnico tcedula not null,
	activo tactivo,
	check (estado in ('FACTURADO','REPARADO','NO REPARADO','EN PROCESO')),
	foreign key (imei) references dispositivo(imei),
	foreign key (cedula_tecnico) references tecnico(cedula),
	primary key (imei,fecha_recibido));

create table factura(
	numero serial not null,
	monto_total tcosto,
	fecha_entrega date not null,
	cedula_cli tcedula not null,
	imei varchar(15) not null,
	fecha_recibido date not null,
	activo tactivo,
	foreign key (imei,fecha_recibido) references reparacion(imei,fecha_recibido),
	foreign key (cedula_cli) references cliente(cedula),
	primary key (numero));

create table detalle(
	imei varchar(15) not null,
	fecha_rec date not null,
	cantidad integer not null,
	codigo_rep varchar(10) not null,
	costo tcosto,
	activo tactivo,
	foreign key (imei,fecha_rec) references reparacion(imei,fecha_recibido),
	foreign key (codigo_rep) references repuesto(codigo),
	primary key (imei, fecha_rec, codigo_rep, cantidad));
