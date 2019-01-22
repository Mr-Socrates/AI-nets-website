<?php
include("../phpmailer/src/PHPMailer.php");
include("../phpmailer/src/SMTP.php");
include("../phpmailer/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['email'])){
    $email = $_POST['email'];
    echo "Your given mail is: " . $email . "\r\n\r\n";
} else {
    echo "noemail \r\n";
    return;
}
if (!empty($_GET['email'])) {
    echo "JS says mail " . $_GET['email']; // Outputs : JS says Hi!
}

$mail = new PHPMailer();

//$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'silhavydaniel@gmail.com';          // SMTP username
$mail->Password = 'B4chelard';              // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('info@GreeFWWT.com', 'Greece');
$mail->addReplyTo('info@REPLY.com', 'HA REPLY');
$mail->addAddress('silhavydan@gmail.com');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>How to Send Email using PHP in Localhost by CodexWorld</h1>';
$bodyContent .= '<p>This is the HTML email sent from localhost using PHP script by <b>CodexWorld</b></p>';

$mail->Subject = 'TEST mail from Localhost by CodexWorld';
$mail->Body = $bodyContent;


if (!$mail->send()) {
    echo 'OLD:Contact_me.php?? Message could not be sent.\r\n';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

$message = "Your account is registered";
$to=$email;
$subject="Registration";
$from = 'our team';
$body='hello, your account is activated';
$headers = "From:".$from;

if (mail ($to, $subject, $body, $headers)) {
    echo '<p>OLD-Contact_me.php?? Your message has been sent!<br></p>';
} else {
    echo '<p>Something went wrong, go back and try again!<br></p>';
}

?>
