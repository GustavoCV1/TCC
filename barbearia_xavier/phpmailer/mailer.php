<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$contact = 0;
$signup = 0;
$recovery = 0;

try {
   
    include 'mailer.conf.php';
    
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;      // Ativar saída de depuração detalhada
    $mail->isSMTP();                            // Enviar usando SMTP Server
    $mail->SMTPAuth   = true;                   // Habilitar autenticação SMTP Server
    $mail->Host       = $smtpHost;              // Endereço do SMTP Server para enviar
    $mail->Username   = $smtpUser;              // Nome de usuário SMTP Server
    $mail->Password   = $smtpPass;              // Senha SMTP Server
    $mail->SMTPSecure = (($smtpAuth=="TLS/SSL") ? (PHPMailer::ENCRYPTION_STARTTLS) : (PHPMailer::ENCRYPTION_SMTPS) );
    $mail->CharSet    = "UTF-8";
                                                // Ative a criptografia TLS ou use `PHPMailer::ENCRYPTION_SMTPS` 
    $mail->Port       = $smtpPort;              // Porta TCP para conectar, use 465 para `PHPMailer::ENCRYPTION_SMTPS`
    
    if (isset($_POST['contactform'])){
        $primeironome = stripit($_POST['first-name']);
        $segundonome = stripit($_POST['last-name']);
        
        $nome = $primeironome . " " . $segundonome;
        $email = stripit($_POST['email']);
        $telefone = stripit($_POST['phone']);
        $mensagem = trim(stripslashes($_POST['message']));
        
        $destinatiario  = array(nome=>"Barbearia Xavier", email=>$mail->Username);
        $destinatiario2 = array(nome=>"", email=>"");
        $reponderPara   = array(email=>$email, informacao=>$nome);
        $comCopiaPara   = "";
        $comCopiaOculta = "";
        //Recipients
        $mail->setFrom($destinatiario["email"], $destinatiario["nome"]);
        if ( $destinatiario["email"] != "" )
            $mail->addAddress($destinatiario["email"], $destinatiario["nome"]);     // Adicionar o destinatário
        if ( $destinatiario2["email"] != "" )
            $mail->addAddress($destinatiario2["email"], $destinatiario2["nome"]);               // O nome é opcional
        if ( $reponderPara["email"] != "" )
            $mail->addReplyTo($reponderPara["email"], $reponderPara["informacao"]);
        if ( $comCopiaPara != "" )
            $mail->addCC ( $comCopiaPara );
        if ( $comCopiaOculta != "" )
            $mail->addBCC( $comCopiaOculta );

        // Content
        $mail->isHTML(true);                                  //  Email em formato HTML?
        $mail->Subject = 'Mensagem de ' . $nome . ' para a Barbearia Xavier';
        $mail->Body    = 'Nome: ' . $nome . '<br>
                          Email: ' . $email . '<br>
                          Telefone: ' . $telefone . '<br>
                          Mensagem: ' . $mensagem;
        $mail->AltBody = 'Nome: ' . $nome . '
                          Email: ' . $email . '
                          Telefone: ' . $telefone . '
                          Mensagem: ' . $mensagem;
        
        $mail->SMTPDebug = 0; // 0 não mosta retorno do Servidor SMTP como ECHO
        $mail->send();
        $erroEnvio = $mail->ErrorInfo;
        $contact = 1;
    }
    
    if (isset($_POST['signupform'])){      
        $email = stripit($_POST['regname']);
        $nome = stripit($_POST['reguser']);
        
        $destinatiario  = array(nome=>$nome, email=>$email);
        $destinatiario2 = array(nome=>"", email=>"");
        $reponderPara   = array(email=>"noreply@example.com", informacao=>"Não responder este email!");
        $comCopiaPara   = "";
        $comCopiaOculta = "";
        //Recipients
        $mail->setFrom($destinatiario["email"], $destinatiario["nome"]);
        if ( $destinatiario["email"] != "" )
            $mail->addAddress($destinatiario["email"], $destinatiario["nome"]);     // Adicionar o destinatário
        if ( $destinatiario2["email"] != "" )
            $mail->addAddress($destinatiario2["email"], $destinatiario2["nome"]);               // O nome é opcional
        if ( $reponderPara["email"] != "" )
            $mail->addReplyTo($reponderPara["email"], $reponderPara["informacao"]);
        if ( $comCopiaPara != "" )
            $mail->addCC ( $comCopiaPara );
        if ( $comCopiaOculta != "" )
            $mail->addBCC( $comCopiaOculta );

        // Content
        $mail->isHTML(true);                                  //  Email em formato HTML?
        $mail->Subject = 'Verificação de Conta - Barbearia Xavier';
        $mail->Body    = 'Sua conta foi criada e o login será habilitado após a verificação de conta. Por favor, clique <b>no link abaixo</b> para ativar sua conta: <br/><br/>
        localhost/barbearia_xavier/verificarconta.php?email='.$email.'&chave='.$chave.'';
        $mail->AltBody = 'Sua conta foi criada e o login será habilitado após a verificação de conta. Por favor, clique <b>no link abaixo</b> para ativar sua conta: <br/><br/>
        localhost/barbearia_xavier/verificarconta.php?email='.$email.'&chave='.$chave.'';
        
        $mail->SMTPDebug = 0; // 0 não mosta retorno do Servidor SMTP como ECHO
        $mail->send();
        $erroEnvio = $mail->ErrorInfo;
        $signup = 1;
    }
    
    if (isset($_POST['recoveryform'])){      
        $email = stripit($_POST['email']);
        
        $destinatiario  = array(nome=>"", email=>$email);
        $destinatiario2 = array(nome=>"", email=>"");
        $reponderPara   = array(email=>"noreply@example.com", informacao=>"Não responder este email!");
        $comCopiaPara   = "";
        $comCopiaOculta = "";
        //Recipients
        $mail->setFrom($destinatiario["email"], $destinatiario["nome"]);
        if ( $destinatiario["email"] != "" )
            $mail->addAddress($destinatiario["email"], $destinatiario["nome"]);     // Adicionar o destinatário
        if ( $destinatiario2["email"] != "" )
            $mail->addAddress($destinatiario2["email"], $destinatiario2["nome"]);               // O nome é opcional
        if ( $reponderPara["email"] != "" )
            $mail->addReplyTo($reponderPara["email"], $reponderPara["informacao"]);
        if ( $comCopiaPara != "" )
            $mail->addCC ( $comCopiaPara );
        if ( $comCopiaOculta != "" )
            $mail->addBCC( $comCopiaOculta );

        // Content
        $mail->isHTML(true);                                  //  Email em formato HTML?
        $mail->Subject = 'Redefinição de Senha - Barbearia Xavier';
        $mail->Body    = 'Olá! Recebemos um pedido de redefinição de senha para a sua conta da Barbearia Xavier.<br/><br/>
        Seu código para a redefinição de senha é:<br/><br/><br/>
        
        <span style="font-size: 30px;">'.$cod.'</span><br/><br/><br/>
        Caso você não tenha feito esse pedido, ignore esta mensagem.';
        $mail->AltBody = 'Olá! Recebemos um pedido de redefinição de senha para a sua conta da Barbearia Xavier.
        Seu código para a redefinição de senha é:'.$cod.'. Caso você não tenha feito esse pedido, ignore esta mensagem.';
        
        $mail->SMTPDebug = 0; // 0 não mosta retorno do Servidor SMTP como ECHO
        $mail->send();
        $erroEnvio = $mail->ErrorInfo;
        $recovery = 1;
    }
    
}
    
catch (Exception $e) {
    if ($contact == 1) {
        $status = "Mensagem não enviada! Erro: ".$erroEnvio."";
        header("location:index.php?status=".$status."");
        exit();
    }
    
    if ($signup == 1) {
        $status = "Email para a verificação de conta não enviado! Erro: ".$erroEnvio."";
        header("location:login.php?status=".$status."");
        exit();
    }
    
    if ($recovery == 1) {
        $status = "Email para a redefinição de senha não enviado! Erro: ".$erroEnvio."";
        header("location:recovery.php?status=".$status."");
        exit();
    }
}       

?>
