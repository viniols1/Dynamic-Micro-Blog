<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Micro-Blog</title>
    <link rel="stylesheet" href="view/style.css">
</head>

<body>
    <h1>Micro-Blog do Vinicius</h1>

    <section id="novo-post">
        <h2>Nova Postagem</h2>
        <input type="text" id="titulo" placeholder="Título da sua postagem">
        <textarea id="conteudo" placeholder="Escreva sua postagem aqui..."></textarea>
        <button onclick="salvarPost()">Publicar no Blog</button>
    </section>

    <section id="container-posts"></section>
    <script src="view/script.js"></script>
</body>

</html>