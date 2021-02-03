<?php

    session_start();

    function stripit($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    require $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/phpmailer/mailer.php';       

    if ($contact == 1) {
        $_SESSION['mensagemcontato'] = "O email foi enviado!";
        header("location:index.php");
        exit();
    }

    elseif ($signup == 1) {
        header("location:login.php");
        exit();
    }

    elseif ($recovery == 1) {
        header("location:recovery.php");
        exit();
    }

    else{
        header("location:index.php");
        exit();
    }

?>