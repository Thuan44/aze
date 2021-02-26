<?php

// Encrypt password
$password1 = "MotDePasse1";

$encrypted_password = password_hash($password1, PASSWORD_DEFAULT);

echo $encrypted_password;

// Verify password
if (password_verify($password1, $encrypted_password)) {
    echo "Mot de pass correct";
} else {
    echo "Mot de pass incorrect";
}