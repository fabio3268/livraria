<?php

if(!empty($_GET["idBook"])){
    $id = $_GET["idBook"];
    include __DIR__ . "/source/connection.php";
    include __DIR__ . "/source/helpers.php";

    $query = "SELECT * FROM books WHERE id={$id}";
    $stmt = $conn->query($query);
    $book = $stmt->fetch();
    var_dump($book);

    $genres = getGenres($conn);

}

?>
<form id="book-update">
    <div>
        <input name="id" type="hidden" value="<?=$book->id; ?>">
        Titulo do Livro: <input name="title" value="<?=$book->title; ?>" type="text">
    </div>
    <div>
        Autor do Livro: <input name="author" value="<?=$book->author; ?>" type="text">
    </div>
    <div>
        <select name="genre">
            <?php
            foreach ($genres as $genre){
                echo "<option value='{$genre->id}'>{$genre->description}</option>";
            }
            ?>
        </select>
    </div>
    <button>Salvar</button>
    <div id="message">
    </div>
</form>
<div id="message">
</div>
<script type="text/javascript" async>
    const form = document.querySelector("#book-update");
    const message = document.querySelector("#message");
    form.addEventListener("submit", async  (e) => {
        e.preventDefault();
        const dataBook = new FormData(form);
        const data = await fetch("http://localhost/livraria/api/book-update.php", {
            method : "POST",
            body : dataBook
        });
        const book = await data.json();
        console.log(book);
        message.setAttribute("style","display");
        if(book.type === "success"){
            message.classList.remove("alert-danger");
            message.classList.add("alert-success");
        } else {
            message.classList.remove("alert-success");
            message.classList.add("alert-danger");
        }
        message.textContent = book.message;
        setTimeout(() => {
            message.setAttribute("style","display: none");
        },3000);
    });
</script>


