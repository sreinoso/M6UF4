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
