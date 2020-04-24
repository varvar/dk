<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
// // Check for empty fields
// if(empty($_POST['name'])  		||
//    empty($_POST['email']) 		||
//    empty($_POST['message'])	||
//    !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
//    {
// 	echo "No arguments Provided!";
// 	return false;
//    }
	
// $name = $_POST['name'];
// $email_address = $_POST['email'];
// $message = $_POST['message'];
	
// // Create the email and send the message
// $to = 'sobolmisha@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
// $email_subject = "Website Contact Form:  $name";
// $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
// $headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
// $headers .= "Reply-To: $email_address";	
// mail($to,$email_subject,$email_body,$headers);
// return true;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './mailer/src/Exception.php';
require './mailer/src/PHPMailer.php';
require './mailer/src/SMTP.php';
$mail = new PHPMailer();
$subject = "Test Mail using PHP mailer";
$content = "<b>This is a test mail using PHP mailer class.</b>";
//$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = 587;  
$mail->Username = "varvarcamera";
$mail->Password = "camera!@#";
$mail->Host     = "smtp.gmail.com";
$mail->Mailer   = "smtp";
$mail->SetFrom("koganrealty@yahoo.com", "PHPPot");
$mail->AddReplyTo("koganrealty@yahoo.com", "PHPPot");
$mail->AddAddress("sobolmisha@gmail.com");
$mail->Subject = $subject;
$mail->WordWrap   = 80;
$mail->MsgHTML($content);
$mail->IsHTML(true);

if(!$mail->Send()){
	echo "Mailer Error: " . $mail->ErrorInfo;
	return false;
} 
else {
	return true;
}
			
?>