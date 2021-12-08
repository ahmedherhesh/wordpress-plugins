<?php
if (!empty($_POST)) {
    $name  = strip_tags($_POST['name']);
    $email = filter_var(strip_tags($_POST['email']), FILTER_VALIDATE_EMAIL);
    $recipient = $_POST['recipient'];
    $subject   = $_POST['subject'];

    // validation 
    if (!$name || !$email) {
        http_response_code(400);
        echo 'Please Fill Out All Fields';
        exit;
    }

    $message = "Name: $name\n Email: $email\n\n";
    $header = "From: $name <$email>";
    if (@mail($recipient, $subject, $message, $header)) {
        http_response_code(200);
        echo 'You are now Subscribed';
    } else {
        http_response_code(500);
        echo 'There was a problem';
    }
} else {
    http_response_code(403);
    echo 'The Get Method Is Not Supported In This Route';
}
