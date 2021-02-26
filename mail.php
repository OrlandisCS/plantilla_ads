<?php
include 'index.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
if (isset($_POST['enviar_datos'])) {

  $nombre = $_POST['nombre'];
  $telefono = $_POST['numero'];
  if(empty($nombre)){
   echo "<script>                            
    Swal.fire(
      'inCorrecto',
      'Rellena los campos',
      'error'
    ).then(resultado => {
      if (resultado.value) {
          // Hicieron click en 'Sí'
          window.history.back() ;     }else{
            window.history.back() ;
      }
  });
    </script> ";
    exit();
  }
  if(empty($telefono)){
  echo "<script>                            
    Swal.fire(
      'inCorrecto',
      'Rellena los campos',
      'error'
    ).then(resultado => {
      if (resultado.value) {
          // Hicieron click en 'Sí'
          window.history.back() ;     }else{
            window.history.back() ;
      }
  });
    </script> ";
   exit();}
  try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.ionos.es';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'ocs@orlandisdev.com';                     // SMTP username
    $mail->Password   = 'Mariaolan1.';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('ocs@orlandisdev.com', 'Orlandisdev');
    $mail->addAddress('ocs@orlandisdev.com', $nombre);     // Add a recipient
    /*   $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    // Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); */    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Correo de contacto';
    $mail->Body    = "Nombre: $nombre<br>Email: $email<br> Telefono: $telefono<br> Mensaje:<b>$mensaje</b>";
    $mail->send();
    echo "<script>                            
    Swal.fire(
      'Correcto',
      'Mensaje enviado correctamente <br> en breve me pondre en contacto con usted',
      'success'
    ).then(resultado => {
      if (resultado.value) {
          // Hicieron click en 'Sí'
          window.location.href='http://reto21.yumasoto.es' ;     }else{
            window.location.href='http://reto21.yumasoto.es' ;
      }
  });
    </script> ";
  } catch (Exception $e) {
    echo "<script>                            
    Swal.fire(
      'inCorrecto',
      'Error al enviar mensaje',
      'error'
    ).then(resultado => {
      if (resultado.value) {
          // Hicieron click en 'Sí'
          window.history.back() ;     }else{
            window.history.back() ;
      }
  });
    </script> ";
  }
}
