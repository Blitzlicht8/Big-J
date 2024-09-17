<?php
 
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
//required files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
 
//Create an instance; passing `true` enables exceptions
if (isset($_POST["submitContact"])) {
 
  $mail = new PHPMailer(true);
 
    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;             //Enable SMTP authentication
    $mail->Username   = 'rhenallenpabalan@gmail.com';   //SMTP write your email
    $mail->Password   = 'xhlyjobhrkkoovzs';      //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    $mail->Port       = 465;                                    
 
    //Recipients
    $mail->setFrom( $_POST["email"], $_POST["name"]); // Sender Email and name
    $mail->addAddress('rhenallenpabalan@gmail.com');     //Add a recipient email  
    $mail->addReplyTo($_POST["email"], $_POST["name"]); // reply to sender email
 
    //Content
    $mail->isHTML(true);               //Set email format to HTML
    $mail->Subject = $_POST["subject"];   // email subject headings
    $mail->Body = "Email: {$_POST["email"]}\n\nName: {$_POST["name"]}\n\nMessage: {$_POST["message"]}";   //email body (email/name/message)
    
      
    // Validation and Success/Failure sent message alert
    $mail->send();
    if ($mail->send()) {
      echo 
      "
      <script> 
     alert('Message was sent successfully!');
     document.location.href = 'index.html#contact';
    </script>
    "
      ;
    } else {
      echo 'Email could not be sent. Error: ' . $mail->ErrorInfo;
    }

}

  
  /*$receiving_email_address = 'rhenallenpabalan@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'PHPMailer',
    'password' => 'xhlyjobhrkkoovzs',
    'port' => '587'
  );
  

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();*/
?>
