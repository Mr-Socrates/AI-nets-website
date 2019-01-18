<?php

if(isset($_POST['email'])){
    $email = $_POST['email'];
    echo $email;
}else{
    echo "noemail";
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
