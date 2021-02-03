CREATE DATABASE barbearia CHARSET utf8;

USE barbearia;

CREATE TABLE usuario (
	idUsuario    	INT NOT NULL auto_increment,
    nome            VARCHAR(50) NOT NULL,
	email      		VARCHAR(100) UNIQUE NOT NULL,
    senha           VARCHAR(255) NOT NULL,
    telefone        INT(15),
    permissao		CHAR(1) NOT NULL, -- {"U" = Usuário, "F" = Funcionário, "A" = Administrador}
    foto            VARCHAR(255),
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
    cliente         INT NOT NULL,
    barbeiro        INT NOT NULL,
    servico         INT NOT NULL,
    horario			DATETIME, -- {AAAA/MM/DD hh:mm:ss:(fração)}
    PRIMARY KEY (idAtendimento),
    FOREIGN KEY (cliente) REFERENCES usuario(idUsuario),
    FOREIGN KEY (barbeiro) REFERENCES usuario(idUsuario),
    FOREIGN KEY (servico) REFERENCES servico(idServico)
);

INSERT INTO usuario (nome, email, senha, permissao) 
	VALUES ("Administração", "italorlui@gmail.com", "$2y$10$tEp24z199iKMgfn.NfdnWe3fnSdw8W1IztZG9W8l2jXMlaIzBoj9m", "A");