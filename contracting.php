<?php
$state_select = $_POST['state'];

if (isset($_POST['send'])) {
    $to = 'ContactUs@OneWisconsin.com';
    $subject = 'Contracting';
    $message = 'Name: ' . $_POST['name'] . "\r\n\r\n";
    $message .= 'Phone Number: ' . $_POST['number'] . "\r\n\r\n";
    $message .= 'E-Mail: ' . $_POST['email'] . "\r\n\r\n";
    $message .= 'Address: ' . $_POST['address'] . "\r\n\r\n";
    $message .= 'City: ' . $_POST['city'] . "\r\n\r\n";
    $message .= 'State: ' . $state_select . "\r\n\r\n";
    $message .= 'Zip Code: ' . $_POST['zip'];
    $headers = "From: Contracting@channelpartners.biz\r\n";
    $headers .= 'Content-Type: text/plain; charset=utf-8';
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if ($email) {
        $headers .= "\r\nReply-To: $email";
    }
    $success = mail($to, $subject, $message, $headers);
}
?>

<body>
<?php if (isset($success) && $success) { ?>
<h1>Thank You!</h1>
Your Message Has Been Sent.
<?php } else { ?>
<h1>Whoops!</h1>
Sorry, There Was A Problem Sending Your Message.
<?php } ?>
</body>