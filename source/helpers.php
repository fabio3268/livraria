<?php

function getGenres ($conn){
    $query = "SELECT * 
              FROM genres";
    $stmt = $conn->query($query);
    return $stmt->fetchAll();
}