<!DOCTYPE html>
<html>
<head>
    <title> Contato </title>
    <meta charset="utf-8">
</head>
<body>
    <form method="POST" action="Contato.controller.php" > 
        <p> Nome</p> <input type="text" name="nome" />
        <br/>
        <p> Email </p> <input type="text" name="email" />
        <br/>
        <p> Assunto </p> <textarea name = "assunto" rows="5" cols="50">
            Digite sua mensagem!!!
        </textarea>
        <br/>
        <input type="submit" name = "acao" value="Enviar"/>
    </form>
</body>
</html>