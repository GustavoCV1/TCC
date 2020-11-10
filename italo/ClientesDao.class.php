<?php

// DAO - DATA ACCESS OBJECT
// Serve como intermediário entre o modelo de classe e as informações do BD (Funções).

class ClientesDao {
    
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
        $cmdDML  = "SELECT idCliente, email, senha, telefone, nome, nascimento, genero, foto FROM barbearia.clientes";
        $cmdDML .= (($where != "")?(" WHERE ". $where):""); // Concatena o requisito no final da variável.
        $resultSet = $this->query( $cmdDML );
        return ($resultSet);
        
    }
    public function insert($idCliente, $email, $senha, $telefone, $nome, $nascimento, $genero, $foto) {
        $cmdDML  = "INSERT INTO barbearia.clientes ( idCliente, email, senha, telefone, nome, nascimento, genero, foto) VALUES ('$idCliente', '$email', '$senha', '$telefone', '$nome', '$nascimento', '$genero', '$foto')";
        $resultSet = $this->query( $cmdDML );
        return ($resultSet);
        
    }
    public function update($idCliente, $email, $senha, $telefone, $nome, $nascimento, $genero, $foto) {
        $cmdDML  =
        "UPDATE barbearia.clientes SET
                email = '$email',
                senha = '$senha',
                telefone = '$telefone',
                nome = '$nome',
                nascimento = '$nascimento',
                genero = '$genero',
                foto = '$foto',
            WHERE idCliente = idCliente = '$idCliente'";
        $resultSet = $this->query( $cmdDML );
        return ($resultSet);
    }
    public function delete($idCliente) {
        $cmdDML  = "DELETE FROM barbearia.cliente WHERE idCliente = '$idCliente'";
        $resultSet = $this->query( $cmdDML );
        return ($resultSet);
    }
    
}

?>