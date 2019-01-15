require_once('phpmailer/class.phpmailer.php');
<?php
/**
 * Created by PhpStorm.
 * User: Inez
 * Date: 15/01/2019
 * Time: 16:49
 */

if(isset($_POST['email'])){
    $email = $_POST['email'];
}else{
    return;
}

$message = "Your account is registered";
$to=$email;
$subject="Registration";
$from = 'our team';
$body='hello, your account is activated';
$headers = "From:".$from;
if (mail ($to, $subject, $body, $headers)) {
    echo '<p>Your message has been sent!</p>';
} else {
    echo '<p>Something went wrong, go back and try again!</p>';
}

echo "An Activation Code Is Sent To You Check You Emails";

?>