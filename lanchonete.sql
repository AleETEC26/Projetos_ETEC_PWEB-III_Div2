create database lanchonete;
use lanchonete;
create table usuarios
    (
        usuid int primary key auto_increment,
        usunome varchar(100),
        usulogin varchar(100),
        ususenha varchar(100),
        usulogado boolean default 0
    );
create table categorias(
    catid int primary key auto_increment,
    catnome varchar(100),
    catativo boolean default 0
);