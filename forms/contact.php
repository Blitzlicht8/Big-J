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
    $mail->Username   = 'bigjofficial@globalsurge.org';   //SMTP write your email
    $mail->Password   = 'xxxxxxxxxxxxxxxx';      //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    $mail->Port       = 465;                                    
 
    //Recipients
    $mail->setFrom( $_POST["email"], $_POST["name"]); // Sender Email and name
    $mail->addAddress('bigjofficial@globalsurge.org');     //Add a recipient email  
    $mail->addReplyTo($_POST["email"], $_POST["name"]); // reply to sender email
 
    //Content
    $mail->isHTML(true);               //Set email format to HTML
    $mail->Subject = $_POST["subject"];   // email subject headings
    $mail->Body = "Email: {$_POST["email"]}
                  </br>Name: {$_POST["name"]}
                  </br>Message: {$_POST["message"]}";   //email body (email/name/message)
    
      
    // Validation and Success/Failure sent message alert
    if ($mail->send()) {
      echo 
      "
      <script> 
     alert('Message was sent successfully!');
     document.location.href = '../contactus.html';
    </script>
    "
      ;
    } else {
      echo 'Email could not be sent. Error: ' . $mail->ErrorInfo;
    }

}

?>
