SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET NAMES utf8;

create database databanco;
use databanco;

CREATE TABLE IF NOT EXISTS gerentes (

    id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    foto varchar(100),
    nome varchar(255) NOT NULL,
    cpf varchar(15) NOT NULL,
    datanasc datetime NOT NULL,
    depto varchar(100),
    cep varchar(9) NOT NULL,
    cidade varchar(100) NOT NULL,
    estado varchar(2) NOT NULL,
    bairro varchar(100) NOT NULL,
    endereco varchar (255) NOT NULL,
    telefone varchar(13) NOT NULL,
    celular varchar(13) NOT NULL,
    ie varchar(15) NOT NULL,
    created datetime NOT NULL,
    modified datetime NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4