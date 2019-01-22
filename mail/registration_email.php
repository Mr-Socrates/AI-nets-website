<?php
include("../phpmailer/src/PHPMailer.php");
include("../phpmailer/src/SMTP.php");
include("../phpmailer/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['email'])){
    $email = $_POST['email'];
    //    echo "Your given mail is: " . $email . "\r\n\r\n";
} else {
    echo "noemail \r\n";
    return;
}

$mail = new PHPMailer();

//$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'testingphilosopher@gmail.com';          // SMTP username
$mail->Password = 'B4chelard !';              // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('testingphilosopher@gmail.com', 'AIGames');
$mail->addReplyTo('testingphilosopher@gmail.com', 'REPLY');
$mail->addAddress('silhavydan@gmail.com');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>Would you like to play some fancy games?</h1>';
$bodyContent .= '<p>Now it is possible, because your account has been activated!</p>';

$mail->Subject = 'Your account has been activated. Enjoy the game!';
$mail->Body = $bodyContent;


if (!$mail->send()) {
    echo 'Message could not be sent.<br>';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {

    echo '<script type="text/javascript">
                alert("Activation email was sent to ' . $email . '");
        </script>';
}

header("refresh:1;url=../user-admin.php");

//$message = "Your account is registered";
//$to=$email;
//$subject="Registration";
//$from = 'our team';
//$body='hello, your account is activated';
//$headers = "From:".$from;
//
//if (mail ($to, $subject, $body, $headers)) {
//    echo '<p>OLD-Contact_me.php?? Your message has been sent!<br></p>';
//} else {
//    echo '<p>Something went wrong, go back and try again!<br></p>';
//}

?>
