<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../../assets/vendor/phpmailer/src/PHPMailer.php';
require '../../assets/vendor/phpmailer/src/Exception.php';
require '../../assets/vendor/phpmailer/src/SMTP.php';

class SendEmailController
{
    /*Función para envíar el correo al cliente confirmando que se recibió correctamente su mensaje*/
    function sendemailclient($arrayData)
    {
        $name = $arrayData['name'];
        $email = $arrayData['email'];
        $phone = $arrayData['phone'];
        $mesagge = $arrayData['message'];

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
//            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'mail.siscorp.mx';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'contacto@siscorp.mx';                     // SMTP username
            $mail->Password = 's0p0rt3STE2020';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->CharSet = 'UTF-8';

            //Código para agregar una imagen y después se manda a llamar con <img src=""/>
            $mail->AddEmbeddedImage('../../assets/img/favicon.png', 'emailimg', 'attachment', 'base64', 'image/png');
            $mail->AddEmbeddedImage('../../assets/img/faviconLittle.png', 'favicon', 'attachment', 'base64', 'image/png');

            //Recipients
            $mail->setFrom('contacto@siscorp.mx');
            $mail->addAddress($email);

            $html = '';
            $html .= '<!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="utf-8">
                    <link rel="icon" href="img/favicon.png" type="image/png" />
                    <title>SisCorp</title>
                </head>
                <body style="background-color: white; ">
                
                <!--Copia desde aquí-->
                <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 0">
                            <a href="http://www.siscorp.mx/">
                                <img src="cid:emailimg" class="img-logo" />
                            </a>
                        </td>
                    </tr>
                
                    <tr>
                        <td style="background-color: #ecf0f1">
                            <div style="color: #1045EC; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
                                <h2 style="color: #1045EC; margin: 0 0 7px">¡Hola,'.$name.'!</h2><br>
                                <p style="margin: 2px; font-size: 15px">
                                    Hemos recibido tu mensaje correctamente <br>
                                
                                    <br>
                                    <br>
                                    <br>
                                    Recuerda que ofrecemos diferentes servicios:
                                </p>
                                <ul style="font-size: 15px;  margin: 10px 0">
                                    <li>Cableado estructurado</li>
                                    <li>Consultoría y Asesoría</li>
                                    <li>Seguridad y CCTV</li>
                                    <li>Control de Acceso</li>
                                    <li>Soporte Técnico</li>
                                </ul>
                                <br>
                                <p style="margin: 2px; font-size: 15px; text-align: center">
                                    Gracias por tu preferencia
                                </p><br>
                                <div style="width: 100%; text-align: center">
                                    <a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #35A5DD" href="http://www.siscorp.mx/">Visitanos</a>
                                </div>
                                <p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0"> Copyright &copy; <img width="16px" height="16px" src="cid:favicon"> SisCorp 2021</p>
                            </div>
                        </td>
                    </tr>
                </table>
                <!--hasta aquí-->
                
                </body>
            </html>';

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Mensaje Recibido SisCorp';
            $mail->Body = $html;

            $mail->send();
            echo 'ok';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    /*Función para envíar el correo a la empresa*/
    function sendemaiself($arrayData)
    {
        $name = $arrayData['name'];
        $email = $arrayData['email'];
        $phone = $arrayData['phone'];
        $mesagge = $arrayData['message'];

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
//            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'mail.siscorp.mx';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'contacto@siscorp.mx';                     // SMTP username
            $mail->Password = 's0p0rt3STE2020';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->CharSet = 'UTF-8';

            //Código para agregar una imagen y después se manda a llamar con <img src=""/>
            $mail->AddEmbeddedImage('../../assets/img/favicon.png', 'emailimg', 'attachment', 'base64', 'image/png');
            $mail->AddEmbeddedImage('../../assets/img/faviconLittle.png', 'favicon', 'attachment', 'base64', 'image/png');
            //Recipients
            $mail->setFrom($email);
            $mail->addAddress('contacto@siscorp.mx');
            $html = "";

            $html .= '<!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="utf-8">
                    <link rel="icon" href="img/favicon.png" type="image/png" />
                    <title>SisCorp</title>
                </head>
                <body style="background-color: black ">
                
                <!--Copia desde aquí-->
                <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
                
                    <tr>
                        <td style="padding: 0">
                            <a href="http://www.siscorp.mx">
                                <img style="padding: 0; display: block; alignment: center;" src="cid:emailimg" width="50%">
                            </a>
                        </td>
                    </tr>
                
                    <tr>
                        <td style="background-color: #ecf0f1">
                            <div style="color: #1045EC; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
                                <h2 style="color: #1045EC; margin: 0 0 7px">¡Hola, SisCorp!</h2><br>
                                <i style="margin: 2px; font-size: 15px">
                                    Un Cliente ha envíado un correo por medio de la página web <i><a href="http://www.siscorp.mx">SISCORP</a></i>
                                    <br>
                                    <br>
                                    <br>
                                    Los datos que contiene son:
                                </p>
                                <ul style="font-size: 15px;  margin: 10px 0">
                                    <li>Email: '. $email .'</li>
                                    <li>Teléfono: '. $phone .'</li>
                                    <li>Mensaje: '. $mesagge .'</li>
                                </ul>
                                <br>
                                <p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0"> Copyright &copy; <img src="cid:favicon" width="4%"> SisCorp 2021</p>
                            </div>
                        </td>
                    </tr>
                </table>
                <!--hasta aquí-->
                
                </body>
            </html>';

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Mensaje de la página SisCorp ' . $name;
            $mail->Body = $html;

            $mail->send();
            echo 'ok';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}