<?php
require("db.php");
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require('vendor/autoload.php');

function send_mail($to, $subject, $message)
{
	$mail = new PHPMailer(true);

	try {
	    //Server settings
	    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
	    $mail->isSMTP();                                            // Set mailer to use SMTP
	    $mail->Host       = 'smtp.gmail.com;';  					// Specify main and backup SMTP servers
	    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	    $mail->Username   = "lytanloc141@gmail.com";          // SMTP username
	    $mail->Password   = "qoujbvixdhnvdkol";                        		// SMTP password
	    $mail->SMTPSecure = 'ssl';     // Enable TLS encryption, `ssl` also accepted
	    $mail->Port       = 465;                                    // TCP port to connect to
	    $mail->setFrom('lytanloc141@gmail.com', 'Tan Loc');
	    $mail->addAddress($to);

	    // Content
	    $mail->isHTML(true);                                  		// Set email format to HTML
	    $mail->Subject = $subject;
	    $mail->Body    = $message;

	    $mail->send();
	    echo 'Message has been sent';
	} catch (Exception $e) {
	    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}



$conn = mysqli_connect("localhost", "root", "", "db_elearning");
$email = $_POST["email"];
$sql = "SELECT * FROM tblstudent WHERE STUDUSERNAME = '$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
	$reset_token = time() . md5($email);

	$sql = "UPDATE tblstudent SET reset_token='$reset_token' WHERE STUDUSERNAME='$email'";
	mysqli_query($conn, $sql);

	$message = "<p>Please click the link below to reset your password</p>";
	$message .= "<a href='http://localhost/finalProjectWEB/reset-password.php?email=$email&reset_token=$reset_token'>";
	$message .= "Reset password";

	send_mail($email, "reset-password" , $message);
}
else
{
	echo "Email does not exists";
}

?>