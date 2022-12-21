<?php

include __DIR__ . "/source/connection.php";


$query = "SELECT * 
          FROM books
          JOIN genres ON books.genre_id = genres.id";

$stmt = $conn->query($query);

while ($book = $stmt->fetch()){
    var_dump($book);
    echo "<div><a href='book-update.php?idBook={$book->id}'>{$book->title}</a></div>";
}
