<?php

include __DIR__ . "/../source/connection.php";
$book = filter_var_array($_POST, FILTER_DEFAULT);
//echo json_encode($book, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

// o código abaixo realiza o update em um regitro na tabela users
// faça o mesmo para ser realizada um update na tabela books

if(in_array("", $book)){
    $response = [
        "type" => "error",
        "message" => "Informe o Titulo e Autor!"
    ];
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$query = "UPDATE books SET title = '{$book["title"]}', author = '{$book["author"]}' WHERE id = {$book["id"]}";

$conn->query($query);

$response = [
    "type" => "success",
    "message" => "Livro alterado com sucesso!"
];
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);