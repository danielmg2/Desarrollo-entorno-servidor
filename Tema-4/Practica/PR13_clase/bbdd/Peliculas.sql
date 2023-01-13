create database peliculas;
use peliculas;

create table pelicula(
    id  int primary key,
    nombre varchar(50) NOT NULL,
    puntuacion float() NOT NULL,
    fecha date NOT NULL
);


INSERT INTO pelicula VALUES(1,'El Rey Leon','9.6','1990-01-10');
INSERT INTO pelicula VALUES(2,'La vida es Bella','8.5','2001-02-01');
INSERT INTO pelicula VALUES(3,'El Padrino','9.0','1980-05-02');
INSERT INTO pelicula VALUES(4,'SharkNado','5.2','2005-11-28');
INSERT INTO pelicula VALUES(5,'Interstellar','9,9','2014-10-02');
-- INSERT INTO pelicula VALUES(6,'');
-- INSERT INTO pelicula VALUES(7,'');
-- INSERT INTO pelicula VALUES(8,'');
-- INSERT INTO pelicula VALUES(9,'');
-- INSERT INTO pelicula VALUES(10,'');