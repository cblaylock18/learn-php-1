<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 2;

$note = $db->query(
    "SELECT * FROM notes where id = :id",
    [':id' => $_POST['id']]
)->findOrFail();

authorize($note['user_id'] === $currentUserId);

$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = "Note body must be included and be no more than 1000 characters.";
}

if (! empty($errors)) {
    return view("notes/edit.view.php", [
        'heading' => "Edit a Note",
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query(
    "update `notes` set `body` = :body where `id` = :id;",
    [
        'body' => $_POST['body'],
        'id' => $note['id']
    ]
);

header('location: /notes');
die();
