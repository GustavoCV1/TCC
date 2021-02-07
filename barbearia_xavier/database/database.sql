CREATE DATABASE barbearia CHARSET utf8;

USE barbearia;

CREATE TABLE usuario (
	idUsuario    	INT NOT NULL auto_increment,
    nome            VARCHAR(50) NOT NULL,
	email      		VARCHAR(100) UNIQUE NOT NULL,
    senha           VARCHAR(255) NOT NULL,
    telefone        INT(15),
    permissao		CHAR(1) NOT NULL, -- {"U" = Usuário, "F" = Funcionário, "A" = Administrador}
    chave           VARCHAR(32),
    verificada      INT(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (idUsuario)
);

CREATE TABLE servico (
	idServico   	INT NOT NULL auto_increment,
	nome       		VARCHAR(50) NOT NULL,
    preco           DECIMAL(10,2),
    descricao       varchar(250),
    PRIMARY KEY (idServico)
);

CREATE TABLE atendimento (
    idAtendimento   INT NOT NULL auto_increment,
    cliente         VARCHAR(255),
    barbeiro        VARCHAR(255),
    servico         VARCHAR(255),
    horario            DATETIME, -- {AAAA/MM/DD hh:mm:ss:(fração)}
    PRIMARY KEY (idAtendimento)
);

INSERT INTO usuario (nome, email, senha, permissao, verificada) 
	VALUES ("Administrador", "barbeariaxavierkx@gmail.com", "$2y$10$K2qZIBB4dZfAAN0Oz/riouo8.77Pn4UfNnexoA0yw0xFh4coi7F8q", "A", "1");
    
INSERT INTO usuario (nome, email, senha, permissao, verificada) 
	VALUES ("Empresa Plexus", "groupplexus@gmail.com", "$2y$10$Q28dZ6TB2FHcFRhCWjOrX.IfrwnIxagTD1A2nimsLw/XdffvB90bG", "F", "1");
    
INSERT INTO usuario (nome, email, senha, permissao, verificada) 
	VALUES ("Gustavo Vasselai", "gyesgamer@gmail.com", "$2y$10$smkeRWDwhr5036gpiVeeR.wd.WMtdfZNY.EIbMOtwZi32KYUwHzBG", "U", "1");