<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = "Note body must be included and be no more than 1000 characters.";
}

if (! empty($errors)) {
    view("notes/create.view.php", [
        'heading' => "Create a Note",
        'errors' => $errors,
    ]);
}

if (empty($errors)) {
    $db->query(
        "insert into `notes`(`body`, `user_id`) values (:body, :user_id);",
        [
            'body' => $_POST['body'],
            'user_id' => 2
        ]
    );

    header('location: /notes');
    die();
}
