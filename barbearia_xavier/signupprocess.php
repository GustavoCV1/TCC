<?php

    require_once '../database/DBQuery.class.php';
    require_once '../classes/Usuario.class.php';

    $email = $senha1 = $senha2 = $nome = $telefone = "";

    function stripit($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = mysql_real_escape_string($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && count($_POST) > 0){
        $nome = stripit($_POST['nome']);
        $email = stripit($_POST['email']);
        $senha1 = stripit($_POST['senha1']);
        $senha2 = stripit($_POST['senha2']);
        $telefone = stripit($_POST['telefone']);
        
        if ($senha1 != $senha2) {
            header("location:login.php?errocriar=As duas senhas não são iguais!");
        }
        
        else {
            
            $tableName  = "barbearia.usuario";
            $fields     = "nome, email";
            $keyField   = "idUsuario";

            $dbquery = new DBQuery($tableName, $fields, $keyField);
            $resultSet = $dbquery->select("email = '$email' OR nome = '$nome' LIMIT 1;");

            $usuario = mysqli_fetch_assoc($resultSet);

            if (mysqli_num_rows($usuario) > 0) { #Se um usuário de mesmo nome ou email já existir...
                if ($usuario['email'] === $email) {
                    header("location:login.php?errocriar=Email já cadastrado!");
                }

                elseif ($usuario['nome'] === $nome) {
                    header("location:login.php?errocriar=Um usuário com o mesmo nome já existe!");
                }
            }

            else {
                
                $senha_hasheada = password_hash($senha1, PASSWORD_DEFAULT);
                $fields = "nome, email, senha, telefone, permissao, chave";
                
                $chave = md5(rand(0,1000)); // Hash de 32 caracteres aleatórios. Será usado na verificação de email.
                // Exemplo: f4552671f8909587cf485ea990207f3b
                
                $criar = $dbquery->insert($nome, $email, $senha_hasheada, $telefone, "U", $chave);
                
                // MANDAR EMAIL DE CONFIRMAÇÃO AQUI E ADICIONAR verificar.php
                
                session_start();
  	            $_SESSION['usuario'] = $nome;
  	            $_SESSION['logado'] = true;
                setcookie("usuario", $nome, time()+60*60);
  	            header("location:pagusuario.php");
                
            }   
            
        }
        
    }

?>