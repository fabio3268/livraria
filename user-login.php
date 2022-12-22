<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div id="message"></div>
<form id="login-form" >
    <div>
        E-mail <input name="email" type="text">
    </div>
    <div>
        Password <input name="password" type="text">
    </div>
    <div>
        <button>Login</button>
    </div>
</form>
</body>
</html>
<script type="text/javascript" async>
    const form = document.querySelector("#login-form");
    const message = document.querySelector("#message");
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataUser = new FormData(form);
        const data = await fetch("http://localhost/livraria/api/user-login.php",{
            method: "POST",
            body: dataUser,
        });
        const user = await data.json();
        console.log(user);
        message.textContent = user.message;
        message.setAttribute("style","display")
        if(user.type === "error"){
            // trocar o status da message
            message.classList.remove("alert-success");
            message.classList.add("alert-danger");
        } else {
            // trocar o status da message
            message.classList.remove("alert-danger");
            message.classList.add("alert-success");
        }
        setTimeout(() => {
            message.setAttribute("style","display: none")
        }, 3000);
    });
</script>