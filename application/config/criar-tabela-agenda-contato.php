<?php
/*******************************************************************
*@author Daniel Siqueira
*Developed by Daniel Mello Siqueira: http://danielsiqueira.net
********************************************************************/
/**
*MYSQL*
create database agenda;
use agenda;
create table if not exists agenda_contato
    (
     id int(25) not null auto_increment primary key,
     nome varchar(25),
     sobrenome varchar(25),
     genero varchar(1),
     telefone varchar(20),
     celular varchar(20),
     email varchar(100)
    );
  
 create table usuario 
   (
    id int(25) not null auto_increment primary key,
    login varchar(50)  not null,
    senha varchar(100) not null
   );
   insert into usuario(login, senha) values('usuario', MD5('123456'));
  
*/




