<?php

if ($_POST) {
    $email = $_POST['email'];
    $subject = 'You have a message!';
    $message = wordwrap($_POST['message'], 70, "\r\n");
    $headers = 'From: admin@mail.com' . "\r\n" .
        'Reply-To: admin@mail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $isMailSent = mail($email, $subject, $message, $headers);

    if ($isMailSent) {
        echo 'Mail sent!';
    } else {
        echo 'Something wrong!';
    }
}