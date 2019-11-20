<?php

if (isset($_POST['email']) && isset($_POST['message'])) {

    if (checkEmail($_POST['email'])) {

        $email = $_POST['email'];
        $subject = 'You have a message!';
        $message = wordwrap($_POST['message'], 70, "\r\n");
        $headers = 'From: admin@mail.com' . "\r\n" .
            'Reply-To: admin@mail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        $isMailSent = mail($email, $subject, $message, $headers);

        $status = $isMailSent ? 'Mail sent!' : 'Mail is not sent!';
        echo json_encode(['status' => $status]);

    } else {
        echo json_encode(['status' => 'Email address is incorrect!']);
    }

} else {
    echo json_encode(['status' => 'Something wrong!']);
}

function checkEmail($email)
{
    return preg_match('/^[a-zA-Z0-9_\-.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-.]+$/', $email);
}