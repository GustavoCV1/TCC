CREATE DATABASE barbearia CHARSET utf8;

USE barbearia;

CREATE TABLE usuario (
	idUsuario    	INT NOT NULL auto_increment,
    nome            VARCHAR(50),
	email      		VARCHAR(100),
    senha           VARCHAR(100),
    telefone        INT(15),
    permissao		CHAR(1), -- {"U" = Usuário, "F" = Funcionário, "D" = Dono}
    foto            VARCHAR(255),
    PRIMARY KEY (idUsuario)
);

CREATE TABLE servico (
	idServico   	INT NOT NULL auto_increment,
	nome       		VARCHAR(50),
    preco           DECIMAL(10,2),
    descricao       varchar(250),
    PRIMARY KEY (idServico)
);

CREATE TABLE atendimento (
    idAtendimento   INT NOT NULL auto_increment,
    cliente         INT,
    barbeiro        INT,
    servico         INT,
    horario			DATETIME, -- {AAAA/MM/DD hh:mm:ss:(fração)}
    PRIMARY KEY (idAtendimento),
    FOREIGN KEY (cliente) REFERENCES usuario(idUsuario),
    FOREIGN KEY (barbeiro) REFERENCES usuario(idUsuario),
    FOREIGN KEY (servico) REFERENCES servico(idServico)
);