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

    // private function template so just we can use it
    private function email_template($subject, $body, $receiver)
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

        $mail->addAddress($receiver);                        // Add a recipient

        $mail->isHTML(TRUE);                           // Set email format to HTML
        $mail->ContentType = 'text/html; charset=utf-8\r\n';
        $mail->Subject = $subject;                          // Subject
        $mail->Body    = $body;                             // Message

        if(!$mail->send()) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function send_welcome_mail()
    {
        if($this->email_template('Welcome!', 'Je bent succesvol geregistreerd.', $this->input->post('email'))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function send_recovery_email()
    {
        /**
         * recovery link, link to a User.php function to give the user a form with the option
         * to give up a new password to then login with.
         *
         * the given password must be hashed with the same algorithm as in the register function.
         */
        $body = 'recovery link';
        // send email from the template function
        if($this->email_template('Recovery', $body, $this->input->post('email'))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
