create database peliculas;
use peliculas;

create table pelicula(
    id  int primary key,
    nombre VARCHAR(75) NOT NULL,
    puntuacion float(5,2) NOT NULL,
    fecha date NOT NULL
);


INSERT INTO pelicula VALUES(1,'El Rey Leon','9.6','1990-01-10');
INSERT INTO pelicula VALUES(2,'La vida es Bella','8.5','2001-02-01');
INSERT INTO pelicula VALUES(3,'El Padrino','9.0','1980-05-02');
INSERT INTO pelicula VALUES(4,'SharkNado','5.2','2005-11-28');
INSERT INTO pelicula VALUES(5,'Interstellar','9.9','2014-10-02');
INSERT INTO pelicula VALUES(6,'Buller Train','6.7','2022-10-22');
INSERT INTO pelicula VALUES(7,'Uncharted','5.6','2022-01-05');
INSERT INTO pelicula VALUES(8,'Knives Out','8.9','2019-05-01');
INSERT INTO pelicula VALUES(9,'Noche de Juegos','5.7','2018-02-23');
INSERT INTO pelicula VALUES(10,'Wind River','6.9','2017-08-30');