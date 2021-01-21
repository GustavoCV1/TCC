<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Recuperação de Senha</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <link rel="stylesheet" href="recovery.css">

  <script src="js/jquery-2.1.3.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>

<body>

<div class="container">    
    <div id="recoverybox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Recuperação de Senha</div>
                <div style="float:right; font-size: 90%; position: relative; top:-10px; margin-left:20px;"><a href="login.php">Voltar</a></div>
            </div>     

            <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="recovery-alert" class="alert alert-danger col-sm-12"></div>     
                <form id="recoveryform" class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars("recoveryprocess.php")?>">
                
                <p>Digite seu endereço de email. Enviaremos um email com a redefinição de senha.</p>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="email" required type="email" class="form-control" name="email" value="Email" placeholder="Email">                                        
                </div>

                <div style="margin-top:10px" class="form-group">

                    <div class="col-sm-12 controls">
                        <input type="submit" id="btn-recovery" name="btn-recovery" class="btn btn-warning" value="Confirmar"/>
                    </div>
                </div>   
            </form>     
        </div>                     
    </div>  
</div>
</div>

</body>
</html>