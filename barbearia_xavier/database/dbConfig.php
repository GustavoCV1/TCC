<?php 
    
    $databaseHost   = "localhost";
    $databaseUser   = "root"; /* Mudar dps */
    $databasePass   = ""; /* Mudar dps */
    $databasePort   = "3306";
    $databaseSchema = "barbearia";
    $databaseCharset= "UTF8";
    $databaseConnection = mysqli_connect($databaseHost, $databaseUser, $databasePass, $databaseSchema) OR die("Houve um problema na conexão com o banco de dados. Código de erro: " . mysqli_connect_error());

?>