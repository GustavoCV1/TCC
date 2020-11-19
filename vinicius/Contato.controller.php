<?php

    include('Contato.class.php');

    date_default_timezone_set('America/Sao_Paulo');

    $pdo = new PDO('mysql:host=localhost; dbname=bdvinicius', 'root', '');
    
    if(isset($_POST['acao'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $assunto = $_POST['assunto'];
        $data = date('Y-m-d');


        $insert = $pdo->prepare("INSERT INTO `contato` VALUES(null, ?, ?, ?, ?)");
        $insert->execute(array($nome, $email, $assunto, $data));
        echo "<script> alert('A sua mensagem foi enviada'); </script>";        
        
        /*
        $select = $pdo->prepare("SELECT * FROM `contato` WHERE id = 8");
        $select->execute();

        $informacoes = $select->fetchAll(PDO::FETCH_ASSOC);

        foreach ($informacoes as $key => $value) {
            echo 'Nome: '.$value['nome'];
            echo '<br/>';
            echo 'Email: '.$value['email'];
            echo '<br/>';
            echo 'Mensagem: '.$value['assunto'];        
        }

        $delete = $pdo->prepare("DELETE FROM `contato` WHERE id = 5");
        $delete->execute();
        */
    }
?>