<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&amp;subset=latin,latin-ext'><link rel="stylesheet" href="./login.scss">
  <link rel="shortcut icon" href="imagens/logo_barbearia_2.png" type="image/x-icon"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <link rel="stylesheet" href="login.css">

  <script>
    
      function mostrarSenha() {
        var x = document.getElementById("senha");
        var y = document.getElementById("senha1");
        var z = document.getElementById("senha2");
        
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
          
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
          
        if (z.type === "password") {
            z.type = "text";
        } else {
            z.type = "password";
        }
      }
      
  </script>

</head>

<body>
<!-- partial:index.partial.html -->
<div class="materialContainer">


   <div class="box">

      <div class="title">ENTRAR</div>

      <div class="input">
         <label for="name">Usuário</label>
         <input type="text" name="name" id="name">
         <span class="spin"></span>
      </div>

      <div class="input">
         <label for="pass">Senha</label>
         <input type="password" name="pass" id="pass">
         <span class="spin"></span>
      </div>

      <div class="button login">
         <button><span>Entrar</span> <i class="fa fa-check"></i></button>
      </div>

      <a href="" class="pass-forgot">Esqueceu sua senha?</a>

   </div>

   <div class="overbox">
      <div class="material-button alt-2"><span class="shape"></span></div>

      <div class="title">REGISTRAR</div>

      <div class="input">
         <label for="regname">Usuário</label>
         <input type="text" name="regname" id="regname">
         <span class="spin"></span>
      </div>

      <div class="input">
         <label for="regpass">Senha</label>
         <input type="password" name="regpass" id="regpass">
         <span class="spin"></span>
      </div>

      <div class="input">
         <label for="reregpass">Repetir a senha</label>
         <input type="password" name="reregpass" id="reregpass">
         <span class="spin"></span>
      </div>

      <div class="button">
         <button><span>Próximo</span></button>
      </div>


   </div>

</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./login.js"></script>

</body>
</html>