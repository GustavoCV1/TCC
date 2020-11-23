--
-- Base de Dados: `db_rh`
--
CREATE DATABASE IF NOT EXISTS `db_ba` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_ba`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_func`
--

CREATE TABLE IF NOT EXISTS `tb_beard` (
  `idCont` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comentario` text,
  PRIMARY KEY (`idCont`)
) DEFAULT CHARSET=utf8;

-- ------------------------


--
-- Usuário BD
-- 

CREATE USER IF NOT EXISTS 'aluno'@'localhost' IDENTIFIED BY 'aluno';


GRANT ALL PRIVILEGES ON `db_ba` . * TO 'aluno'@'localhost';