<?php

    include('Contato.class.php');

    date_default_timezone_set('America/Sao_Paulo');

    $pdo = new PDO('mysql:host=localhost; dbname=bdvinicius', 'root', '');
    
    if(isset($_POST['acao'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $assunto = $_POST['assunto'];
        $data = date('Y-m-d');

        $sql = $pdo->prepare("INSERT INTO `contato` VALUES(null, ?, ?, ?, ?)");
        $sql->execute(array($nome, $email, $assunto, $data));
        echo "Sucesso";        
        }

?>