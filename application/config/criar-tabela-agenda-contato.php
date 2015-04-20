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
*/




