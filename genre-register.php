<form id="genre-register">
    <div>
        Descrição: <input name="description" type="text">
    </div>
    <button>Salvar</button>
    <div id="message">
    </div>
</form>

<script type="text/javascript" async>
    const form = document.querySelector("#genre-register");
    const message = document.querySelector("#message");
    form.addEventListener("submit", async  (e) => {
        e.preventDefault();
        const dataGenre = new FormData(form);
        const data = await fetch("http://localhost/livraria/api/genre-insert.php", {
            method : "POST",
            body : dataGenre
        });
        const genre = await data.json();
        console.log(genre);
        message.setAttribute("style","display");
        if(genre.type === "success"){
            message.classList.remove("alert-danger");
            message.classList.add("alert-success");
        } else {
            message.classList.remove("alert-success");
            message.classList.add("alert-danger");
        }
        message.textContent = genre.message;
        setTimeout(() => {
            message.setAttribute("style","display: none");
        },3000);
    });
</script>
