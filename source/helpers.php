<?php

function getGenres ($conn){
    $query = "SELECT * 
              FROM genres";
    $stmt = $conn->query($query);
    return $stmt->fetchAll();
}

function getDepartments($conn){
    $query = "SELECT * 
              FROM departments";
    $stmt = $conn->query($query);
    return $stmt->fetchAll();
}

 function getBookByGenres ($conn, int $genres){
     $query = "SELECT *
              FROM books
              JOIN genres ON books.genre_id = genres.id
              WHERE genres.id = {$genres}";
    $stmt = $conn->query($query);
    return $stmt->fetchAll();
 }

