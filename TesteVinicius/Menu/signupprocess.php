<?php

    require_once '../database/DBQuery.class.php';
    require_once '../classes/Usuario.class.php';

    $email = $senha1 = $senha2 = $nome = $telefone = "";

    function stripit($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
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

            $usuario = mysqli_fetch_assoc($dados);

            if ($usuario) { #Se um usuário de mesmo nome ou email já existir...
                if ($usuario['email'] === $email) {
                    header("location:login.php?errocriar=Email já cadastrado!");
                }

                elseif ($usuario['nome'] === $nome) {
                    header("location:login.php?errocriar=Um usuário com o mesmo nome já existe!");
                }
            }

            else {
                
                $senha1 = md5($senha1); #Senha será guardada encriptada em MD5.
                $fields = "nome, email, senha, telefone, permissao";
                
                $criar = $dbquery->insert($nome, $email, $senha1, $telefone, "U");
                
                session_start();
  	            $_SESSION['usuario'] = $nome;
  	            $_SESSION['logado'] = true;
                setcookie("usuario", $nome, time()+60*60);
  	            header("location:pagusuario.php");
                
            }   
            
        }
        
    }

?>