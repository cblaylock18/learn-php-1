<?php

use Core\Validator;
use Core\Database;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address.';
}

if (! Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please enter a valid password between 7 and 255 characters.';
}

if (! empty($errors)) {
    return view("registration/create.view.php", [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email,
])->find();

if ($user) {
    header('location: /login');
    die();
} else {
    $user = $db->query("INSERT into `users` (`email`, `password`) values
    (:email, :password)", [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    login($user);

    header('location: /');
    die();
}
