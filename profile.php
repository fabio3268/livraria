<?php
session_start();
if(empty($_SESSION["user"]["id"])){
    header("Location:login.php");
}
if(!empty($_SESSION["user"])){
    //var_dump($_SESSION["user"]["id"]);

    include __DIR__ . "/source/connection.php";

    $id = $_SESSION["user"]["id"];
    $query = "SELECT * 
                  FROM users 
                  WHERE id = $id";

    $stmt = $conn->query($query);
    if($stmt->rowCount() == 1){
        $row = $stmt->fetch();
        //var_dump($row);
    }
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div id="message"></div>
<form id="user-profile">
    <div>
        Nome: <input name="name" type="text" value="<?=$row->name;?>">
    </div>
    <div>
        E-mail: <input name="email" type="text" value="<?=$row->email;?>">
    </div>
    <div>
        <button>Registrar</button>
    </div>
</form>
</body>
</html>
<script type="text/javascript" async>
    const form = document.querySelector("#user-profile");
    const message = document.querySelector("#message");
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataUser = new FormData(form);
        const data = await fetch("http://localhost/livraria/api/user-update.php", {
            method : "POST",
            body : dataUser
        });
        const user = await data.json();
        document.querySelector("#message").setAttribute("style","display");
        console.log(user.message);
        if(user.type === "success"){
            message.classList.remove("alert-danger");
            message.classList.add("alert-success");
        } else {
            message.classList.remove("alert-success");
            message.classList.add("alert-danger");
        }
        message.textContent = user.message;
        setTimeout(() => {
            message.setAttribute("style","display: none");
        },4000);
    });
</script>