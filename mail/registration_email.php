<?php
require_once('phpmailer/class.phpmailer.php');

header('Content-Type: application/json');

$aResult = array();

if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

if( !isset($aResult['error']) ) {

    switch($_POST['functionname']) {
        case 'send':
            if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 2) ) {
                $aResult['error'] = 'Error in arguments!';
            }
            else {

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


                $aResult['result'] = send(floatval($_POST['arguments'][0]), floatval($_POST['arguments'][1]));
            }
            break;

        default:
            $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
            break;
    }

}

echo json_encode($aResult);

?>
