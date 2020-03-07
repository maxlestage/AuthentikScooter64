<?php

namespace App\Service;

use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    public function sendMail($param)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
//            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'cedric.moncade';                     // SMTP username
            $mail->Password   = 'ucthwrkmnwyeknij';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption;
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('cedric.moncade@gmail.com', 'AuthentikScooter');
            $mail->addAddress('anneclaire.nanot@gmail.com', 'Max LESTAGE');     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $param['motif'];
            $mail->Body    = $this->buildMessage($param);

            $mail->send();

            return 'Message envoyé avec succès.';
        } catch (\Exception $e) {
//            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return 'Une erreur s\'est produite. Réessayez ultérieurement';
        }
    }

    private function buildMessage($param)
    {
        $message = '';
        if (!empty($param['prenom'])) {
            $message .= '<p><span>Prénom: '.$param['prenom'].'</span></p>';
        }
        if (!empty($param['nom'])) {
            $message .= '<p><span>Nom: '.$param['nom'].'</span></p>';
        }
        if (!empty($param['adresse'])) {
            $message .= '<p><span>Adresse: '.$param['adresse'].'</span></p>';
        }
        if (!empty($param['code'])) {
            $message .= '<p><span>Code Postal: '.$param['code'].'</span></p>';
        }
        if (!empty($param['ville'])) {
            $message .= '<p><span>Ville: '.$param['ville'].'</span></p>';
        }
        if (!empty($param['telephone'])) {
            $message .= '<p><span>Téléphone: '.$param['telephone'].'</span></p>';
        }
        if (!empty($param['mail'])) {
            $message .= '<p><span>Mail: '.$param['mail'].'</span></p>';
        }
        if (!empty($param['message'])) {
            $message .= '<p>Message:</p><p>'.$param['message'].'</p>';
        }

        return $message;
    }
}
