<?php
include __DIR__ . "/source/connection.php";
include __DIR__ . "/source/helpers.php";
$departaments = getDepartments($conn);

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div id="message"></div>
    <form id="admin-register">
        <div>
            Nome: <input name="name" type="text">
        </div>
        <div>
            E-mail: <input name="email" type="text">
        </div>
        <div>
            Senha <input name="password" type="text">
        </div>
        <div>
        <select name="departaments">
            <?php
            foreach ($departaments as $departaments){
                echo "<option value='{$departaments->id}'>{$departaments->description}</option>";
            }
            ?>
        </select>
    </div>
        <div>
            <button>Registrar</button>
        </div>
    </form>
</body>
</html>
<script type="text/javascript" async>
    const form = document.querySelector("#admin-register");
    const message = document.querySelector("#message");
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataAdmin = new FormData(form);
        const data = await fetch("http://localhost/livraria/api/admin-insert.php", {
            method: "POST",
            body: dataAdmin
        });
        const admin = await data.json();
        console.log(admin);
        document.querySelector("#message").setAttribute("style","display");
        if(admin.type === "success"){
            message.classList.remove("alert-danger");
            message.classList.add("alert-success");
            message.textContent = `Olá, ${admin.name}!`;
        } else {
            message.classList.remove("alert-success");
            message.classList.add("alert-danger");
            message.textContent = admin.message;
        }
        setTimeout(() => {
            message.setAttribute("style","display: none");
        },3000);
    });
</script>
