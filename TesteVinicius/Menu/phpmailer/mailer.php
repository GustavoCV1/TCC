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

try {
   
    include 'mailer.conf.php';
    
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;      // Ativar saída de depuração detalhada
    $mail->isSMTP();                            // Enviar usando SMTP Server
    $mail->SMTPAuth   = true;                   // Habilitar autenticação SMTP Server
    $mail->Host       = $smtpHost;              // Endereço do SMTP Server para enviar
    $mail->Username   = $smtpUser;              // Nome de usuário SMTP Server
    $mail->Password   = $smtpPass;              // Senha SMTP Server
    $mail->SMTPSecure = (($smtpAuth=="TLS/SSL") ? (PHPMailer::ENCRYPTION_STARTTLS) : (PHPMailer::ENCRYPTION_SMTPS) );
                                                // Ative a criptografia TLS ou use `PHPMailer::ENCRYPTION_SMTPS` 
    $mail->Port       = $smtpPort;              // Porta TCP para conectar, use 465 para `PHPMailer::ENCRYPTION_SMTPS`
    

    $destinatiario  = array(nome=>"Nome do Destinatário", email=>"conta@domínio.com.br");
    $destinatiario2 = array(nome=>"", email=>"");
    $reponderPara   = array(email=>"", informacao=>"");
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

// Attachments
/* 
    $anexos = array("file1.jpg", "file2.jpg"); // Deve conter os  caminho e o nome futuro do arquivo
    $mail->addAttachment($anexos[1]);         // Adicionar Anexos
    $mail->addAttachment($anexos[2]);
*/
    
    // Content
    $mail->isHTML(true);                                  //  Email em formato HTML?
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->SMTPDebug = 1; // 0 não mosta retorno do Servidor SMTP como ECHO
    $mail->send();
    echo 'Mensagem enviada com sucesso!';
} catch (Exception $e) {
    echo "Mensagem não enviada! Erro: {$mail->ErrorInfo}";
}

?>
