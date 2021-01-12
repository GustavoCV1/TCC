<?php

    include_once 'dbConfig.php';
    include_once 'DBConnection.class.php';

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
            
            $sql = "SELECT * FROM usuario WHERE email = '$email' OR nome = '$nome' LIMIT 1;";

            $dados = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
            $usuario = mysqli_fetch_assoc($dados);

            if ($user) { #Se um usuário de mesmo nome ou email já existir...
                if ($user['email'] === $email) {
                    header("location:login.php?errocriar=Email já cadastrado!");
                }

                elseif ($user['nome'] === $nome) {
                    header("location:login.php?errocriar=Um usuário com o mesmo nome já existe!");
                }
            }

            else {
                
                $senha1 = md5($senha1); #Senha será guardada encriptada em MD5.
                
                $sql = "INSERT INTO usuario (nome, email, senha, telefone, permissao) VALUES('$nome', '$email', '$senha1', '$telefone', 'U')";
  	            $criar = mysqli_query($conexao, $sql);
                session_start();
  	            $_SESSION['usuario'] = $nome;
  	            $_SESSION['logado'] = true;
                setcookie("usuario", $nome, time()+60*60);
  	            header("location:pagusuario.php");
                
            }   
            
        }
        
    }

?>