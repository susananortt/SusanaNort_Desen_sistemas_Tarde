create database clinica;
use clinica;

CREATE TABLE funcionario
( 
 pk_func INT NOT NULL PRIMARY KEY auto_increment, 
 nome_func VARCHAR(30) NOT NULL,
 data_nasc DATE NOT NULL,
 telefone VARCHAR(15) NOT NULL,
 genero VARCHAR(1) NOT NULL,
 cargo_func VARCHAR(20) NOT NULL,
 perfil VARCHAR(10) NOT NULL); 
 
CREATE TABLE produto 
( 
 pk_prod INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
 nome_prod VARCHAR(20)NOT NULL,
 preco_prod FLOAT NOT NULL, 
 desc_prod VARCHAR(80) NOT NULL,  
 quant_prod INT NOT NULL,  
 fk_forn INT NOT NULL,
 foreign key(fk_forn) references fornecedor(pk_forn)
  ); 

CREATE TABLE fornecedor
( 
 pk_forn INT NOT NULL PRIMARY KEY AUTO_INCREMENT,  
 nome_forn VARCHAR(20) NOT NULL,  
 ender_forn VARCHAR(60) NOT NULL,  
 tele_forn VARCHAR(15) NOT NULL,
 prod_forn VARCHAR(20) NOT NULL); 
  

CREATE TABLE cliente 
( 
 pk_cli INT NOT NULL PRIMARY KEY auto_increment,  
 nome_cli VARCHAR(20) NOT NULL,  
 tele_cli VARCHAR(15) NOT NULL,  
 email_cli VARCHAR(40) NOT NULL,  
 data_nasc DATE NOT NULL,  
 genero VARCHAR(1) NOT NULL,  
 perfil VARCHAR(10) NOT NULL); 

CREATE TABLE login 
( 
 pk_login INT NOT NULL PRIMARY KEY auto_increment,  
 usuario VARCHAR(25) NOT NULL,  
 senha VARCHAR(16) NOT NULL
); 

CREATE TABLE agendamento 
( 
 pk_agen INT NOT NULL PRIMARY KEY auto_increment,  
 fk_proc INT,
 foreign key(fk_proc) references procedimento(pk_proc),
 data_agen DATE NOT NULL,  
 hora_agen INT NOT NULL,  
 fk_cli INT,
 foreign key(fk_cli) references cliente(pk_cli)
); 


CREATE TABLE procedimento 
( 
 pk_proc INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
 nome_proc VARCHAR(25) NOT NULL,
 desc_agen VARCHAR(50) NOT NULL,
 fk_agen INT ); 
 