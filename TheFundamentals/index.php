<?php

$books = [
    [
        'name' => 'The Great Gatsby',
        'author' => 'F. Scott Fitzgerald',
        'year' => 1925,
        'purchaseUrl' => 'http://example.com'
    ],
    [
        'name' => 'To Kill a Mockingbird',
        'author' => 'Harper Lee',
        'year' => 1960,
        'purchaseUrl' => 'http://example.com'
    ],
    [
        'name' => 'Pride and Prejudice',
        'author' => 'Harper Lee',
        'year' => 1813,
        'purchaseUrl' => 'http://example.com'
    ],
    [
        'name' => 'The Catcher in the Rye',
        'author' => 'J.D. Salinger',
        'year' => 1951,
        'purchaseUrl' => 'http://example.com'
    ],
];

$filteredBooks = array_filter($books, function ($book) {
    return $book['year'] >= 1950 && $book['author'] === 'Harper Lee';
});

require 'index.view.php';
