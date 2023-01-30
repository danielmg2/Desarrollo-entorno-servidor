create database conciertos;


create table concierto(
    id int primary key auto_increment,
    grupo varchar(30) not null,
    fecha date not null,
    precio int not null,
    lugar varchar(30),
);