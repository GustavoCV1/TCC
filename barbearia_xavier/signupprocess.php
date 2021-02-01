<?php

    require $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/database/DBQuery.class.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/classes/Usuario.class.php';

    $email = $senha1 = $senha2 = $nome = $telefone = "";
    session_start();

    function stripit($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && count($_POST) > 0){
        $nome = stripit($_POST['reguser']);
        $email = stripit($_POST['regname']);
        $senha1 = stripit($_POST['regpass']);
        $senha2 = stripit($_POST['reregpass']);
        
            
        $tableName  = "barbearia.usuario";
        $fields     = "nome, email";
        $keyField   = "idUsuario";

        $dbquery1 = new DBQuery($tableName, $fields, $keyField);
        $resultSet = $dbquery1->select("email = '$email' OR nome = '$nome' LIMIT 1;");

        $usuario = mysqli_fetch_assoc($resultSet);
        $ok = !empty($usuario);

        if ($ok == TRUE) { #Se um usuário de mesmo nome ou email já existir...
            if ($usuario['email'] === $email) {
                $_SESSION['mensagem'] = "Um usuário com o mesmo email já existe!";
            }

            elseif ($usuario['nome'] === $nome) {
                $_SESSION['mensagem'] = "Um usuário com o mesmo nome já existe!";
            }
            
            header("location:login.php");
            exit();
            
        }

        else {
                
            $senha_hasheada = password_hash($senha1, PASSWORD_DEFAULT);
            $fields = "nome, email, senha, permissao, chave";
                
            $chave = md5(rand(0,1000)); // Hash de 32 caracteres aleatórios. Será usado na verificação de email.
            // Exemplo: f4552671f8909587cf485ea990207f3b
            
            $dbquery2 = new DBQuery($tableName, $fields, $keyField);
            $criar = $dbquery2->insert($nome, $email, $senha_hasheada, "U", $chave);
                
            // MANDAR EMAIL DE CONFIRMAÇÃO AQUI E ADICIONAR verificar.php

  	         $_SESSION['usuario'] = $nome;
  	         $_SESSION['logado'] = true;
             setcookie("usuario", $nome, time()+60*60*1000);
  	         header("location:pagusuario.php");
             exit();
                
        }   
            
    }

?>