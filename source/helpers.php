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
// a função deve se chamar getDoctorsBySpecialty

// function getDoctorsBySpecialty ($conn, int $specialtyId){
//     $query = "SELECT *
//              FROM doctors
//              JOIN specialties ON doctors.specialty_id = specialties.id
//              WHERE specialty_id = {$specialtyId}";
//    $stmt = $conn->query($query);
//    return $stmt->fetchAll();
// }

