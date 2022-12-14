<?php
// A linha abaixo recebe as indormações de um médico
// Faça o mesmo para receber as informçõe de u livro
// $doctor = filter_var_array($_POST, FILTER_DEFAULT);



// O código abaixo verifica se as informações do formulário foram todas digidatas
// senão a mensagem de erro é retornada, faça o mesmo para o livro
//if(in_array("",$doctor)){
//    $response = [
//        "type" => "error",
//        "message" => "Informe Nome, CRM e Especialidade do Médico"
//    ];
//    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
//    exit;
//}

include __DIR__ . "/../source/connection.php";

// O código abaix, caso as informações do médico já tenha sido informada
// realiza o insert na tabela, faça o mesmo para a inclusão do livro
//$query = "INSERT INTO doctors (name, document, specialty_id)
//          VALUES ('{$doctor["name"]}','{$doctor["document"]}', {$doctor["specialty"]})";
//$conn->query($query);
//$response = [
//    "type" => "success",
//    "message" => "Médico cadastrado com sucesso!"
//];
//echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);