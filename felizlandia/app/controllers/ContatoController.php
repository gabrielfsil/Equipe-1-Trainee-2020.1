<?php

namespace App\Controllers;
use App\Core\App;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;



class ContatoController{

    public function sendMail(){

        $destinatario = "felizlandia.code@gmail.com";
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];
        $assunto = $_POST['assunto'];
        
        if (isset($_POST['sendCopy']))
        {   
            $sendCopy = $_POST['sendCopy'];
        } else {
            $sendCopy = 0;

        }
    

        //Create a new PHPMailer instance
        $mail = new PHPMailer;

        $mail->CharSet = 'UTF-8';

        //o codigo abaixo arruma bug de openssl na ultima versão do PHP
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );

        //Tell PHPMailer to use SMTP
        $mail->isSMTP(true);

        //Enable SMTP debugging
        // SMTP::DEBUG_OFF = off (for production use)
        // SMTP::DEBUG_CLIENT = client messages
        // SMTP::DEBUG_SERVER = client and server messages
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 465;

        //Set the encryption mechanism to use - STARTTLS or SMTPS
        $mail->SMTPSecure = 'ssl';

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = 'felizlandia.code@gmail.com';

        //Password to use for SMTP authentication
        $mail->Password = 'CODEbdv2906';

        $mailCopy = $mail;//para copia do email


        //Set who the message is to be sent from
        $mail->setFrom($email, $nome);

        //Set an alternative reply-to address
        $mail->addReplyTo($email, $nome);

        //Set who the message is to be sent to
        $mail->addAddress($destinatario, 'Felizlândia Park');

        //Set the subject line
        $mail->Subject = $assunto;
        $mail->Body  = "<html><body style='font-family: Arial, Helvetica, sans-serif;text-align:center;'><hr style='width:50%;'>";
        $mail->Body  = $mail->Body  . "<p style='color:#0c5da6;font-weight:bold'>FALE CONOSCO - FELIZLÂNDIA PARK</p>";
        $mail->Body  = $mail->Body  . " <hr style='width:50%;'> <br>";
        $mail->Body  = $mail->Body  . "<ul style='list-style-type: none;text-align:center;'><li><strong style='color:#fc2c2a;'>Nome:</strong> " . $nome . "</li>";
        $mail->Body  = $mail->Body  . "<li><strong style='color:#fc2c2a;'>Email:</strong> " . $email."</li>";
        if($sendCopy){
            $mail->Body  = $mail->Body  . "<li><strong style='color:#fc2c2a;'>Assunto:</strong> " . $assunto ."</li>";
           }
        $mail->Body  = $mail->Body  . "<li><strong style='color:#fc2c2a;'>Mensagem:</strong> " . $mensagem ."</li></ul>";
        $mail->Body  = $mail->Body . "<br><hr style='width:50%;'>";
        $mail->Body  = $mail->Body . "<br><p>2349 Rua Josezinho das nuvens, 203 | (36) 2534-2300 | felizlandiapark.com.br</p>";


        $mail->isHTML(true);
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

        //Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';

        //Attach an image file
        //$mail->addAttachment('/PHPMailer-master/images/phpmailer_mini.png');

        //send the message, check for errors
        if (!$mail->send()) {
            //echo 'Mailer Error: '. $mail->ErrorInfo;
            $acao = ['nome' => 'erro de envio', 'mensagem' => "Não foi possível enviar o email"];
        } else {
            $acao = ['nome' => 'sucesso', 'mensagem' => "Sua mensagem foi enviada com sucesso, agradecemos seu contato!"];

            if($sendCopy)
            {
                $mailCopy->setFrom('felizlandia.code@gmail.com', 'Felizlândia Park');

                //Set an alternative reply-to address
                $mail->addReplyTo('felizlandia.code@gmail.com', 'Felizlândia Park');

                //Set who the message is to be sent to
                $mailCopy->addAddress($email, $nome);

                  //Set the subject line
                $mailCopy->Subject = "Cópia da sua mensagem ao Felizlândia Park";

                $mailCopy->Body = $mail->Body;

                $mailCopy->isHTML(true);

                $mailCopy->send();
          
            }
            //echo 'Message sent!';
            //Section 2: IMAP
            //Uncomment these to save your message in the 'Sent Mail' folder.
            #if (save_mail($mail)) {
            #    echo "Message saved!";
            #}
        }

        //Section 2: IMAP
        //IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
        //Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
        //You can use imap_getmailboxes($imapStream, '/imap/ssl', '*' ) to get a list of available folders or labels, this can
        //be useful if you are trying to get this working on a non-Gmail IMAP server.
        function save_mail($mail)
        {
            //You can change 'Sent Mail' to any other folder or tag
            $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';

            //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
            $imapStream = imap_open($path, $mail->Username, $mail->Password);

            $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
            imap_close($imapStream);

            return $result;
        }




       
        // envia o email
        //mail($destinatario, $assunto , $body, "From: $email\r\n");

        // redireciona para a página de obrigado

        //resolvendo bug do titulo -------
        $titulo = "Contato";
        //fim


        return view('/site/contato', ['titulo' => $titulo,'acao' => $acao]);
    }

    

}