<?php

// DAO - DATA ACCESS OBJECT
// Serve como intermediário entre o modelo de classe e as informações do BD (Funções).

class BarbeiroDao {
    
    private $mysqli; //Usada para a conexão com o banco de dados.
    
    function __construct() { //Alguns não aceitam polimorfismo (várias funções construtoras).
        
    }
    
    private function query( $commandSQL){ //Realiza conexão com o SQL.
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbName="barbearia";
        $port = "3306";
        
        $this->mysqli = new mysqli($host, $user, $pass, $dbName, $port);
        
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            echo "msg falhou";
            exit();
        }
        
        $resultSet = $this->mysqli->query( $commandSQL );
        return( $resultSet );
    }
    
    public function select($where) {
        
        
        /*      if ( $where != "" ){
         $cmdDML = "SELECT idMessage, emailFrom, title, body, readDate FROM poophp.messages";
         }else{
         $cmdDML = "SELECT idMessage, emailFrom, title, body, readDate FROM poophp.messages";
         $cmdDML .=" WHERE ". $where;
         }
         */
        $cmdDML  = "SELECT idBarbeiro, email, senha, telefone, nome, nascimento, genero, foto, descricao FROM barbearia.barbeiro";
        $cmdDML .= (($where != "")?(" WHERE ". $where):""); // Concatena o requisito no final da variável.
        $resultSet = $this->query( $cmdDML );
        return ($resultSet);
        
    }
    public function insert($idBarbeiro, $email, $senha, $telefone, $nome, $nascimento, $genero, $foto, $descricao) {
        $cmdDML  = "INSERT INTO barbearia.barbeiro (idBarbeiro, email, senha, telefone, nome, nascimento, genero, foto, descricao) VALUES ('$idBarbeiro', '$email', '$senha', '$telefone', '$nome', '$nascimento', '$genero', '$foto', '$descricao')";
        $resultSet = $this->query( $cmdDML );
        return ($resultSet);
        
    }
    public function update($idBarbeiro, $email, $senha, $telefone, $nome, $nascimento, $genero, $foto, $descricao) {
        $cmdDML  =
        "UPDATE barbearia.barbeiro SET
                email = '$email',
                senha = '$senha',
                telefone = '$telefone',
                nome = '$nome',
                nascimento = '$nascimento',
                genero = '$genero',
                foto = '$foto',
                descricao = '$descricao',
            WHERE idBarbeiro = idBarbeiro = '$idBarbeiro'";
        $resultSet = $this->query( $cmdDML );
        return ($resultSet);
    }
    public function delete($idBarbeiro) {
        $cmdDML  = "DELETE FROM barbearia.barbeiro WHERE idBarbeiro = '$idBarbeiro'";
        $resultSet = $this->query( $cmdDML );
        return ($resultSet);
    }
    
}

?>