<?php
    require_once "DB.php";
    require_once "contato.class.php";

    $n = $_POST['nome'];
    $s = $_POST['sobrenome'];
    $e = $_POST['email'];
    $c = $_POST['comentario'];

    $contato = new Contato;
	$contato->setNome($n);
    $contato->setSobrenome($s);
    $contato->setEmail($e);
    $contato->setComentario($c);
    $nome = $contato->getNome();
    $sobrenome = $contato->getSobrenome();
    $email = $contato->getEmail();
    $comentario = $contato->getComentario();

    $campos  = "nome, sobrenome, email, comentario";
    $valores = " '$nome', '$sobrenome', '$email', '$comentario' ";

    if( funInsert('tb_beard', $campos, $valores) == TRUE)
    echo"<p class='p-2 m-2 bg-info text-white'> Enviado com sucesso! </p> ";
        else
    echo"<p class='p-2 m-2 bg-warning text-white'>Erro ao enviar </p>";

    echo"<p class='m-2'><input type='submit' value='Voltar' 
    onclick='history.go(-1)' /></p>";

?>
