<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Entrar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <link rel="stylesheet" href="login.css">

  <script src="js/jquery-2.1.3.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>

<body>

<div class="container">    
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Login</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px; margin-left:20px;"><a href="index.php">Voltar para a página inicial</a></div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="recovery.php">Esqueceu a senha?</a></div>
            </div>     

            <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>     
            <form id="loginform" class="form-horizontal" role="form" method="POST" action="">
                                    
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="email" required type="email" class="form-control" name="email" value="" placeholder="Email">                                        
                </div>
                                
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="senha" required type="password" class="form-control" name="senha" placeholder="Senha">
                </div>

                <div style="margin-top:10px" class="form-group">
                <!-- Button -->
                    <div class="col-sm-12 controls">
                        <input type="submit" id="btn-login" class="btn btn-success" value="Entrar"></input>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 control">
                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                            Não tem uma conta? 
                            <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                Crie uma aqui!
                            </a>
                        </div>
                    </div>
                </div>    
            </form>     

        </div>                     
    </div>  
</div>
        
<div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Criar Conta</div>
            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Voltar</a></div>
        </div>  
        <div class="panel-body" >
            <form id="signupform" class="form-horizontal" role="form" method="POST" action="">

                <div id="signupalert" style="display:none" class="alert alert-danger">
                    <p>Erro:</p>
                    <span></span>
                </div>   
 
                <div class="form-group">
                    <label for="email" class="col-md-3 control-label">Email</label>
                    <div class="col-md-9">
                        <input type="email" required class="form-control" name="email" placeholder="Email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="senha" class="col-md-3 control-label">Senha</label>
                    <div class="col-md-9">
                        <input type="password" required class="form-control" name="senha" placeholder="Senha">
                    </div>
                </div>
   
                <div class="form-group">
                    <label for="nome" class="col-md-3 control-label">Nome</label>
                    <div class="col-md-9">
                        <input type="text" required class="form-control" name="nome" placeholder="Nome">
                    </div>
                </div>

                <div class="form-group">
                    <label for="telefone" class="col-md-3 control-label">Telefone</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="telefone" placeholder="Telefone ou Celular">
                    </div>
                </div>

                <div class="form-group">
                    <!-- Button -->                                        
                    <div class="col-md-offset-3 col-md-9">
                    <input type="submit" id="btn-signup" class="btn btn-info" value="Criar Conta"></input>
                    </div>
                </div>
         
            </form>
        </div>
    </div>            
</div> 
</div>

</body>
</html>