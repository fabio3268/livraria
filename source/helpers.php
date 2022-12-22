<?php

function getGenres ($conn){
    $query = "SELECT * 
              FROM genres";
    $stmt = $conn->query($query);
    return $stmt->fetchAll();
}

// A função abaixo busca na tabela doctors os médicos de uma determinada
// especialidade
// Faça o mesmo buscando na tabela books os livros de um determinado genêro
// a função deve se chamar getBooksByGenre

 function getBookByGenres ($conn, int $genres){
     $query = "SELECT *
              FROM books
              JOIN genres ON books.genre_id = genres.id
              WHERE genres.id = {$genres}";
    $stmt = $conn->query($query);
    return $stmt->fetchAll();
 }

