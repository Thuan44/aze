<?php

$name    = 'Thuan';
$to      = 'nobody@example.com';
$subject = 'Création de compte AZE';
$message = file_get_contents("newsletter.php?name=$name");
$headers = array(
    'From' => 'webmaster@example.com',
    'Reply-To' => 'webmaster@example.com',
    'X-Mailer' => 'PHP/' . phpversion(),
    'Content-type' => 'text/html;charset=UTF-8'
);

// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

mail($to, $subject, $message, $headers);

?>