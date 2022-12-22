<?php
  include __DIR__ . "/source/connection.php";
  include __DIR__ . "/source/helpers.php";
  

  // o código abaixo faz a leitura de um idEspecialidade médica
  // depois busca com a função getDoctorsBySpecialty os médicos da
  // especialidade recebida

  $genre = filter_input(INPUT_GET, "Genero");
  $books = getBookByGenres($conn,$genre);
  foreach ($books as $book){
    echo "<p>Titulo: {$book->title} - Autor(a): {$book->author}</p>";
  }
?>
