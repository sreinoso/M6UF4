create database brain;
use brain;

create table PREGUNTA (
    id int auto_increment,
    enunciat varchar(200),
    resposta1 varchar(50),
    resposta2 varchar(50),
    resposta3 varchar(50),
    resposta4 varchar(50),
    respostacorrecta varchar(50),
    primary key(id)
); 
 
create table JUGADOR (
    id int auto_increment,
    nickname varchar(200),
    pwd varchar(200),
    experiencia_total int DEFAULT 0,
    partides_jugades int DEFAULT 0,
    primary key(id)
) ;

INSERT INTO `PREGUNTA` (`id`, `enunciat`, `resposta1`, `resposta2`, `resposta3`, `resposta4`, `respostacorrecta`) VALUES
(1, 'Como se llaman las crias de la mulaCuantas crias tiene una mula', '2', '4', '0', '1', '2'),
(2, 'Que instrumento musical tiene nombre y forma geometricos', 'Circulo', 'Cuadrado', 'Rombo', 'Triangulo', '3'),
(3, 'Con que nombre firmaba Pablo Picasso sus pinturas', 'Pablo', 'Picasso', 'Pablo Picasso', 'Pabicasso', '1'),
(4, 'Cual es el unico mamifero con cuatro rodillas', 'La zebra', 'El elefante', 'El mono', 'El gorila', '1'),
(5, 'Con que dos colores suele tener problemas un daltonico', 'Rojo y verde', 'Amarillo y verde', 'Azul y rojo', 'Verde y Violeta', '0'),
(6, 'En que deporte se usa tiza', 'Ciclismo', 'Aerobic', 'Billar', 'Tiro al arco', '2'),
(7, 'Cuantas piramides hay en Egipto', '3', '10000', '1000', '10', '1'),
(8, 'Que pie puso primero Neil Amstrong sobre la Luna', 'No puso ningun pie, puso primero la bandera', 'Los dos a la vez', 'Derecho', 'Izquierdo', '3'),
(9, 'Como se transmiten mas rapidamente las ondas sonoras', 'Por Tierra', 'Por Aire', 'Por Agua', 'Por Fuego', '2'),
(10, 'Que parte del cuerpo tiene los huesos mas pequenos', 'Mano', 'Pie', 'Oido', 'Pierna', '2');
 
 INSERT INTO `brain`.`JUGADOR` (`id`, `nickname`, `pwd`, `experiencia_total`, `partides_jugades`) VALUES (NULL, 'aaa', PASSWORD('aaa'), '0', '0'), (NULL, 'bbb', PASSWORD('bbb'), '0', '0');
