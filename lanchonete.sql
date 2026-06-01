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
insert into usuarios
(usunome,usulogin,ususenha)
VALUE
('RICARDO DA SILVA ZANATA','RICKS',MD5(123456)),
('ALFREDO ALEXANDRE DE OLIVEIRA','XANDAO',MD5(234567)),
('JOÃO LUIS CHAGAS SANCHES','JOHNNY',MD5(345678)),
('RICARDO AMORIM','AMORIM',MD5(456789));
create table categorias
    (
        catid int primary key auto_increment,
        catnome varchar(100),
        catativo boolean default 1
    );
create table produtos
(
    proid int primary key auto_increment,
    pronome varchar(150),
    provalorvenda double,
    procatid int,
    constraint fkprocatid foreign key (procatid) references categorias (catid)
);
create table ingredientes
(
    ingid int primary key auto_increment,
    ingnome varchar(150),
    ingvalorunitario double
);
create table ingredientesprodutos
(
    ipid int primary key auto_increment,
    ipproid int,
    ipingid int,
    constraint fkipproid foreign key (ipproid) references produtos (proid),
    constraint fkipingid foreign key (ipingid) references ingredientes (ingid)
);