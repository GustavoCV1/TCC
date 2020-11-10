<?php

// DAO - DATA ACCESS OBJECT
// Serve como intermediário entre o modelo de classe e as informações do BD (Funções).

class ServicoDao {
    
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
        $cmdDML  = "SELECT idServico, preco, descricao, barbeiro, nome, equipamento, foto FROM barbearia.servico";
        $cmdDML .= (($where != "")?(" WHERE ". $where):""); // Concatena o requisito no final da variável.
        $resultSet = $this->query( $cmdDML );
        return ($resultSet);
        
    }
    public function insert($idServico, $preco, $descricao, $barbeiro, $nome, $equipamento, $foto) {
        $cmdDML  = "INSERT INTO barbearia.servico (idServico, preco, descricao, barbeiro, nome, equipamento, foto) VALUES ('$idServico', '$preco', '$descricao', '$barbeiro', '$nome', '$equipamento', '$foto')";
        $resultSet = $this->query( $cmdDML );
        return ($resultSet);
        
    }
    public function update($idServico, $preco, $descricao, $barbeiro, $nome, $equipamento, $foto) {
        $cmdDML  =
        "UPDATE barbearia.servico SET
                preco = '$preco',
                descricao = '$descricao',
                barbeiro = '$barbeiro',
                nome = '$nome',
                equipamento = '$equipamento',
                foto = '$foto',
            WHERE idServico = idServico = '$idServico'";
        $resultSet = $this->query( $cmdDML );
        return ($resultSet);
    }
    public function delete($idServico) {
        $cmdDML  = "DELETE FROM barbearia.servico WHERE idServico = '$idServico'";
        $resultSet = $this->query( $cmdDML );
        return ($resultSet);
    }
    
}

?>