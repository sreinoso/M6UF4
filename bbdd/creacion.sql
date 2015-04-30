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
    experiencia_total int,
    partides_jugades int,
    primary key(id)
) ;

INSERT INTO `PREGUNTA` (`id`, `enunciat`, `resposta1`, `resposta2`, `resposta3`, `resposta4`, `respostacorrecta`) VALUES
(1, '¿Cómo se llaman las crías de la mula?¿Cuantas crías tiene una mula?', '2', '4', '0', '1', '2'),
(2, '¿Qué instrumento musical tiene nombre y forma geométricos?', 'Círculo', 'Cuadrado', 'Rombo', 'Triángulo', '3'),
(3, '¿Con qué nombre firmaba Pablo Picasso sus pinturas?', 'Pablo', 'Picasso', 'Pablo Picasso', 'Pabicasso', '1'),
(4, '¿Cuál es el único mamífero con cuatro rodillas?', 'La zebra', 'El elefante', 'El mono', 'El gorila', '1'),
(5, '¿Con qué dos colores suele tener problemas un daltónico?', 'Rojo y verde', 'Amarillo y verde', 'Azul y rojo', 'Verde y Violeta', '0'),
(6, '¿En qué deporte se usa tiza?', 'Ciclismo', 'Aerobic', 'Billar', 'Tiro al arco', '2'),
(7, '¿Cuántas pirámides hay en Egipto?', '3', '10000', '1000', '10', '1'),
(8, '¿Qué pie puso primero Neil Amstrong sobre la Luna?', 'No puso ningún pie, puso primero la bandera', 'Los dos a la vez', 'Derecho', 'Izquierdo', '3'),
(9, '¿Cómo se transmiten más rápidamente las ondas sonoras?', 'Por Tierra', 'Por Aire', 'Por Agua', 'Por Fuego', '2'),
(10, '¿Qué parte del cuerpo tiene los huesos más pequeños?', 'Mano', 'Pie', 'Oído', 'Pierna', '2');
