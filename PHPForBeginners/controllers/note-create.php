<?php

require 'Validator.php';

$config = require 'config.php';
$db = new Database($config['database']);

$heading = "Create a Note";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $errors = [];

    if (! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = "Note body must be included and be no more than 1000 characters.";
    }

    if (empty($errors)) {
        $db->query(
            "insert into `notes`(`body`, `user_id`) values (:body, :user_id);",
            [
                'body' => $_POST['body'],
                'user_id' => 2
            ]
        );
    }
}

require "views/note-create.view.php";
