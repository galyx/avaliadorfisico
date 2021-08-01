<?php

namespace App\Models\DAO;

use App\Models\Entidades\Usuario;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EnviarmailDAO
{
    // Classe enviarmail é chamado no usuario controller
    public function enviarmail(Usuario $mails)
    {
        // Inicia a classe PHPMailer 
        $mail = new PHPMailer(true); 

        try {
            $nome           = $mails->getNome();
            $email          = $mails->getEmail();
            $remetente      = $mails->getRemetente();
            $assunto        = $mails->getAssunto();
            $menssagem      = $mails->getMenssagem();
            

            // Configuração do server
            $mail->SMTPDebug    = SMTP::DEBUG_SERVER;
            $mail->IsSMTP();
            $mail->Host         = "smtp.gmail.com"; // Configuração local da hospedagem
            $mail->SMTPAuth     = true;
            $mail->Username     = 'zednetinformatica@gmail.com';
            $mail->Password     = 'net941216net';
            $mail->SMTPSecure   = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPOptions = array(
                'ssl'=>array(
                    'verify_peer'=>false,
                    'verify_peer_name'=>false,
                    'allow_self_signed'=>true
                )
            );
            $mail->Port         = 587;

            // Destinarios
            $mail->setFrom('zednetinformatica@gmail.com', $remetente);
            $mail->addAddress($email, $nome);
            
            // Conteudos
            $mail->isHTML(true);
            $mail->Subject  = $assunto;
            $mail->Body     = $menssagem;
            $mail->AltBody  = $assunto;
            
            // Envia o e-mail 
            return $mail->Send(); 
        }catch (\Exception $e){
            throw new \Exception("Erro no envio de Email------".$mail->ErrorInfo, 500);
        }
    }
}