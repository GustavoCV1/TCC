<?php

    require $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/database/DBQuery.class.php';

    $email = "";
    session_start();

    function stripit($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && count($_POST) > 0){
        $email = stripit($_POST['email']);
        
        $tableName  = "barbearia.usuario";
        $fields     = "email";
        $keyField   = "idUsuario";
        
        $dbquery = new DBQuery($tableName, $fields, $keyField);
        $resultSet = $dbquery->select("email = '$email' LIMIT 1;");
        
        if (mysqli_num_rows($resultSet) == 0) {
            $_SESSION['mensagemrecovery'] = "A conta especificada não existe!";
            header("location:recovery.php");
            exit();
        }
        
        else {
            
            //Enviar emailkkkkkk
            
        }
        
    }

?>