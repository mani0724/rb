<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/SMTP.php";
require_once "PHPMailer/src/Exception.php";

$mail = new PHPMailer(true);

//google recaptcha api key setting settings
$secretKey ='6LfLbm8kAAAAAPAc-i0Ldu0LOgw_JbvFWC7Q1XWH';

//Enable SMTP debugging.
$mail->SMTPDebug = 0; //0 or 2 

//Set PHPMailer to use SMTP.
$mail->isSMTP();

//Set SMTP host name                          
$mail->Host = "thimphudeluxe.com";

//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;



//Provide username and password     
$mail->Username = "contactus@thimphudeluxe.com";
$mail->Password = "manikandan0724*";

//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";

//Set TCP port to connect to
$mail->Port = 587;

$mail->From = "reservation@thimphudeluxe.com";
$mail->FromName ="Contact Us";

$mail->addAddress("reservation@thimphudeluxe.com", "ThimphuDeluxe");

$mail->isHTML(true);
$mail->Subject = "Contact Form Email";

$message = "
<table>
	<tr><td>Name: </td><td>" . $_POST["name"] . "</td></tr>
	<tr><td>Phone: </td><td>" . $_POST["phone"] . "</td></tr>
	<tr><td>Email: </td><td>" . $_POST["email"] . "</td></tr>
	<tr><td>Message: </td><td>" . $_POST["message"] . "</td></tr>
    <tr><td>Location: </td><td>" . $_POST["location"] . "</td></tr>
</table>
";

$mail->Body = $message;

try {
    $mail->send();
    echo "<h2>Message has been sent successfully</h2>";
  

} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}






?>
