async function buscarPosts() {
    const resposta = await fetch('controller/listar_posts.php');
    const posts = await resposta.json();
    const container = document.getElementById('container-posts');
    container.innerHTML = "";
    
    posts.forEach(post => {
        const divPost = document.createElement('article');
        divPost.innerHTML = "<h2>" + post.titulo + "</h2>";
        divPost.innerHTML += "<p>" + post.conteudo + "</p><small>Postado por: " + post.nome + "</small>";
        container.appendChild(divPost);
    });
}

buscarPosts();