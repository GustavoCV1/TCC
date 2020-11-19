CREATE DATABASE barbearia CHARSET UTF8;

use barbearia;

create table barbeiro(
	idBarbeiro	int not null auto_increment,
	email		varchar(255),
	senha		varchar(255),
	telefone	varchar(20),
	nome		varchar(50),
	nascimento	varchar(16),
	genero		varchar(20),
	foto		varchar(255),
	descricao	varchar(255)
    primary key(idBarbeiro)
);

create table clientes(
	idCliente	int not null auto_increment,
	email		varchar(255),
	senha		varchar(255),
	telefone	varchar(20),
	nome		varchar(50),
	nascimento	varchar(16),
	genero		varchar(20),
	foto		varchar(255)
    primary key(idCliente)
);

create table servico(
	idServico	int not null auto_increment,
	preco		numeric(15, 3),
	descricao	varchar(255),
	barbeiro	varchar(100),
	nome		varchar(50),
	equipamento varchar(100),
	foto		varchar(255)
    primary key(idServico)
);

create table contato(
	idContato	int not null auto_increment,
	nome		varchar(150),
	email	    varchar(150),
	assunto	    varchar(150),
	dia    		date,
    primary key(idContato)
);

INSERT INTO barbearia.clientes (idCliente, email, senha, telefone, nome, nascimento, genero, foto) VALUES
($idCliente, $email, $senha, $telefone, $nome, $nascimento, $genero, $foto);

UPDATE barbearia.clientes SET
email = '$email',
senha = '$senha',
telefone = '$telefone',
nome = '$nome',
nascimento = '$nascimento',
genero = '$genero',
foto = '$foto',
WHERE idCliente = idCliente = '$idCliente';

DELETE FROM barbearia.clientes
WHERE idCliente = '$idCliente';

SELECT idCliente, 
email, 
senha, 
telefone, 
nome, 
nascimento, 
genero, 
foto
FROM barbearia.clientes;