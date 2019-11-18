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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mail form</title>
</head>
<body>
<form method="post">
    <label for="email">Email</label><br/>
    <input type="email" id="email" name="email" placeholder="Enter email..." required/><br/>
    <label for="message">Message</label><br/>
    <textarea id="message" name="message" placeholder="Enter message..." required></textarea><br/>
    <input type="submit" id="button" />

</form>
</body>
</html>