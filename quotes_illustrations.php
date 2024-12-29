<?php
$state_select = $_POST['state'];
$sex_select = $_POST['sex'];
$birth_month_select = $_POST['birthMonth'];
$birth_day_select = $_POST['birthDay'];
$birth_year_select = $_POST['birthYear'];
$product_funding_option_select = $_POST['productFundingOption'];
$solve_for_select = $_POST['solveFor'];

if (isset($_POST['send'])) {
    $to = 'ContactUs@OneWisconsin.com';
    $subject = 'Have Us Generate Your Quote/Illustration';
    $message = 'Name: ' . $_POST['name'] . "\r\n\r\n";
    $message .= 'E-Mail: ' . $_POST['email'] . "\r\n\r\n";
    $message .= 'State: ' . $state_select . "\r\n\r\n";
    $message .= 'Asset Care: ' . $_POST['assetCare'] . "\r\n\r\n";
    $message .= 'Sex: ' . $sex_select . "\r\n\r\n";
    $message .= 'Tobacco/NON-Tobacco: ' . $_POST['tobacco'] . "\r\n\r\n";
    $message .= 'Birth Month: ' . $birth_month_select . "\r\n\r\n";
    $message .= 'Birth Day: ' . $birth_day_select . "\r\n\r\n";
    $message .= 'Birth Year: ' . $birth_year_select . "\r\n\r\n";
    $message .= 'Product Funding Option: ' . $product_funding_option_select . "\r\n\r\n";
    $message .= 'AOB Duration: ' . $_POST['aobDuration'] . "\r\n\r\n";
    $message .= 'Qualified/NON-Qualified: ' . $_POST['qualification'] . "\r\n\r\n";
    $message .= 'Solve For: ' . $solve_for_select;
    $headers = "From: GenerateQuoteIllustration@channelpartners.biz\r\n";
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