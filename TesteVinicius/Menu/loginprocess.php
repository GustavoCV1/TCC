<?php

    $email = $senha = "";

    function stripit($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = stripit($_POST['email']);
        $senha = stripit($_POST['senha']);    
    }

?>