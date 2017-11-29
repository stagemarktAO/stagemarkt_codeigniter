<?php

/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 10/10/2017
 * Time: 09:26
 */
class Mail_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function send_welcome_mail()
    {
        $this->load->library('PHPMailer/Phpmailer');
        $mail = New CI_PHPMailer();

        $mail->Timeout       = 3;                             // 3 sec to connect to smtp
        $mail->CharSet       = 'UTF-8';                       // Charset
        $mail->SMTPDebug     = SMTP::DEBUG_SERVER;
        $mail->Debugoutput   = 'html';

        $mail->host         = 'tls://mail.internship.dvc-icta.nl:2222';
        $mail->Username     = 'internship@internship.dvc-icta.nl';// SMTP username
        $mail->Password     = 'HNNM7A8K0';                    // SMTP password
        $mail->Priority     = 1;                              // Email priority

        $mail->SMTPAuth    = TRUE;                            // Enable SMTP authentication
        $mail->Encoding    = '8bit';
        $mail->From        = 'internship@internship.dvc-icta.nl';
        $mail->FromName    = 'Project stagemarkt';
        $mail->WordWrap    = 900;

        $mail->addAddress($this->input->post('email'));      // Add a recipient

        $mail->isHTML(true);                           // Set email format to HTML
        $mail->ContentType = 'text/html; charset=utf-8\r\n';
        $mail->Subject = 'Welcome!';                          // Subject
        $mail->Body    = 'Je bent succesvol geregistreerd.';  // Message

        if(!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }
}
