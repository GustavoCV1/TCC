<?php

    include_once 'dbConfig.php';
    include_once 'DBConnection.class.php';

    $email = $senha = "";

    function stripit($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && count($_POST) > 0){
        $email = stripit($_POST['email']);
        $senha = stripit($_POST['senha']);
        
        $sql = "SELECT nome, email, senha, permissao FROM barbearia_usuario WHERE email = '$email' AND senha = '$senha';";
        
        $dados = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        
        while ($linha = mysqli_fetch_assoc($dados)) {
            $nm = $linha["nome"];
            $em = $linha["email"];
            $perm = $linha["permissao"];
        }

        if (mysqli_num_rows($dados)==1 && $perm =='U') {
            session_start();
            $_SESSION['usuario'] = true;
            $_SESSION['logado'] = $em;
            setcookie("usuario", $nm, time()+60+60*2);
            header("location:pagusuario.php");
        }
        
        elseif (mysqli_num_rows($dados)==1 && $perm =='F') {
            session_start();
            $_SESSION['funcionario'] = true;
            $_SESSION['logado'] = $em;
            setcookie("usuario", $nm, time()+60+60*2);
            header("location:pagfuncionario.php");
        }
        
        elseif (mysqli_num_rows($dados)==1 && $perm =='A') {
            session_start();
            $_SESSION['administrador'] = true;
            $_SESSION['logado'] = $em;
            setcookie("usuario", $nm, time()+60+60*2);
            header("location:pagadm.php");
        }
        
        else {
            header("location:login.php?erro");
        }
        
    }

?>