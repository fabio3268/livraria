<?php

include __DIR__ . "/../source/connection.php";
$book = filter_var_array($_POST, FILTER_DEFAULT);
echo json_encode($book, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

// o código abaixo realiza o update em um regitro na tabela users
// faça o mesmo para ser realizada um update na tabela books

/*if(in_array("", $user)){
    $response = [
        "type" => "error",
        "message" => "Informe Nome e Email!"
    ];
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$query = "UPDATE users 
          SET name = '{$user["name"]}', email = '{$user["email"]}' 
          WHERE id = {$user->id}";

$conn->query($query);

$response = [
    "type" => "success",
    "message" => "Usuário alterado com sucesso!"
];
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);*/