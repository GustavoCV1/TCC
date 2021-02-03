<?php

    session_start();

    function stripit($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    require $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/phpmailer/mailer.php';       

    if ($contact = 1) {
        header("location:index.php");
        exit();
    }

    if ($signup = 1) {
        header("location:login.php");
        exit();
    }

    if ($recovery = 1) {
        header("location:recovery.php");
        exit();
    }

?>