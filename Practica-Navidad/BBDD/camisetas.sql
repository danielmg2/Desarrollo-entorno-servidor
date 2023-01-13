create database camisetas;
use camisetas;

create table usuarios(
    usuario varchar(30) primary key,
    contraseña varchar(30) not null,
    email varchar(30) not null,
    fecha date not null
);

INSERT INTO usuarios VALUES('admin','admin','admin@gmail.com','2022-12-27');
INSERT INTO usuarios VALUES('mod','mod','mod@gmail.com','2022-12-28');
INSERT INTO usuarios VALUES('daniel','daniel','daniel@gmail.com','2022-12-26');



create table productos(
 id int AUTO_INCREMENT primary key,
 nombre varchar(30) not null,
 descripcion varchar(100) not null,
 precio float(5,2) not null,
 stock int
);

INSERT INTO productos VALUES(1,'Camiseta Argentina','Camiseta de la seleccion de Argentina 50% algodón 50% tela en tallas 34,40 y 45','50.99',10);
INSERT INTO productos VALUES(2,'Camiseta España','Camiseta de la seleccion de España 50% algodón 50% tela en tallas 34,40 y 45','53.75',20);
INSERT INTO productos VALUES(3,'Camiseta Portugal','Camiseta de la seleccion de Portugal 50% algodón 50% tela en tallas 34,40 y 45','43.75',50);



create table roles(
    rol varchar(30) primary key,
    usuario varchar(30),
    CONSTRAINT FOREIGN KEY (usuario) REFERENCES usuarios(usuario)
);

INSERT INTO roles VALUES('administrador','admin');
INSERT INTO roles VALUES('moderador','mod');
INSERT INTO roles VALUES('usuario','daniel');



create table ventas(
    id  int AUTO_INCREMENT primary key,
    usuario varchar(30),
    fecha_compra date not null,
    cod_producto int not null,
    cantidad int not null,
    precio_total float(5,2) not null,
    CONSTRAINT FOREIGN KEY (usuario) REFERENCES usuarios(usuario),
    CONSTRAINT FOREIGN KEY (cod_producto) REFERENCES productos(id)
);

create table albaran(
    id_albaran int AUTO_INCREMENT primary key,
    fecha_albaran date not null,
    cod_producto int not null,
    cantidad int not null,
    usuario varchar(30) not null,
    CONSTRAINT FOREIGN KEY (usuario) REFERENCES usuarios(usuario),
    CONSTRAINT FOREIGN KEY (cod_producto) REFERENCES productos(id)
);










