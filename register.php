<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div id="message"></div>
    <form id="user-register">
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
            <button>Registrar</button>
        </div>
    </form>
</body>
</html>
<script type="text/javascript" async>
    const form = document.querySelector("#user-register");
    const message = document.querySelector("#message");
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataUser = new FormData(form);
        const data = await fetch("http://localhost/livraria/api/user-insert.php", {
            method: "POST",
            body: dataUser
        });
        const user = await data.json();
        console.log(user);
        document.querySelector("#message").setAttribute("style","display");
        if(user.type === "success"){
            message.classList.remove("alert-danger");
            message.classList.add("alert-success");
            message.textContent = `Olá, ${user.name}!`;
        } else {
            message.classList.remove("alert-success");
            message.classList.add("alert-danger");
            message.textContent = user.message;
        }
        setTimeout(() => {
            message.setAttribute("style","display: none");
        },3000);
    });
</script>


