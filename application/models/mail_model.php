<?php

/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 10/10/2017
 * Time: 09:26
 */
class mail_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function send_welcome_mail()
    {
        $this->load->library('PHPMailer/Phpmailer');
        $mail = New CI_PHPMailer();

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Timeout       = 3;                             // 3 sec to connect to smtp
        $mail->CharSet       = 'UTF-8';                       // Charset

        $mail->Host         = 'smtp.gmail.com';               // Specify main and backup SMTP servers
        $mail->Port         = 587;                            // SMTP port
        $mail->Username     = 'projectstagemarktAO@gmail.com';// SMTP username
        $mail->Password     = 'iywA6Ot9UQQDLOBdUhYm';         // SMTP password
        $mail->Priority     = 1;                              // Email priority

        $mail->SMTPSecure   = 'tls';                          // Enable TLS encryption, `ssl` also accepted || ''
        $mail->SMTPAuth     = TRUE;                           // Enable SMTP authentication
        $mail->Encoding    = '8bit';
        $mail->From        = 'projectstagemarktAO@gmail.com';
        $mail->FromName    = 'Project stagemarkt';
        $mail->WordWrap    = 900;

        $mail->addAddress('jamy0184@gmail.com');                        // Add a recipient

        $mail->isHTML(true);                           // Set email format to HTML
        $mail->ContentType = 'text/html; charset=utf-8\r\n';
        $mail->Subject = 'Welcome!';                          // Subject
        $mail->Body    = 'Je bent succesvol geregistreerd.';  // Message
        //$mail->AltBody = strip_tags('body');        // Message as plain text

        if(!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }
}