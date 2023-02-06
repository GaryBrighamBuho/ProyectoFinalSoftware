create database bdSistemaPsicologia;
use bdSistemaPsicologia; 

create table user (
	id int not null auto_increment primary key,
	username varchar(50) not null,
	name varchar(50) not null,
	lastname varchar(50) not null,
	email varchar(255) not null,
	password varchar(60) not null,
	is_active boolean not null default 1,
	created_at datetime,
	tipo int not null default 0, -- 0 administrador / 1 medico / 2 paciente
	check(tipo in (0,1,2))
);

create table pacient (
	id int not null auto_increment primary key,
	name varchar(50) not null,
	lastname varchar(50),
	email varchar(255) not null,
	address varchar(255),
	phone varchar(255),
	image varchar(255),
	is_active boolean not null default 1,
	created_at datetime not null
);


create table medic (
	id int not null auto_increment primary key,
	name varchar(50) not null,
	lastname varchar(50),
	email varchar(255) not null,
	address varchar(255),
	phone varchar(255),
	image varchar(255),
	is_active boolean not null default 1,
	created_at datetime not null
);


create table reservation(
	id int not null auto_increment primary key,
	title varchar(100) not null,
	note text not null,
	date_at varchar(50) not null,
	time_at varchar(50) not null,
	created_at datetime not null,
	pacient_id int not null,
	medic_id int not null,
	estado int not null,
	check(estado in (0,1,2,3,4)),
	foreign key (pacient_id) references pacient(id),
	foreign key (medic_id) references medic(id)
	-- 0 Abierto
	-- 1 Confirmado
	-- 3 Completado
	-- 4 Cancelado
);

insert into user (username,password,tipo,created_at) value ("admin",sha1(md5("admin")),0,NOW());