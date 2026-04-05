let idEdicao = null;

async function buscarPosts() {
    const resposta = await fetch('controller/listar_posts.php');
    const posts = await resposta.json();
    const container = document.getElementById('container-posts');
    container.innerHTML = "";
    
    posts.forEach(post => {
        const divPost = document.createElement('article');
        divPost.innerHTML = `
            <h2>${post.titulo}</h2>
            <p>${post.conteudo}</p>
            <small>Postado por: ${post.nome}</small>
            <div class="acoes">
                <button class="btn-editar" onclick="prepararEdicao(${post.id}, '${post.titulo.replace(/'/g, "\\'")}', '${post.conteudo.replace(/'/g, "\\'")}')">Editar</button>
                <button class="btn-excluir" onclick="excluirPost(${post.id})">Excluir</button>
            </div>
        `;
        container.appendChild(divPost);
    });
}

async function salvarPost() {
    
    const titulo = document.getElementById('titulo').value;
    const conteudo = document.getElementById('conteudo').value;

    if (titulo.trim() === "" || conteudo.trim() === "") {
        alert("Por favor, preencha todos os campos.");
        return;
    }

    const dados = { id: idEdicao, titulo, conteudo };
    
    const url = idEdicao ? 'controller/editar_post.php' : 'controller/salvar_post.php';

    const resposta = await fetch(url, {
        method: 'POST',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(dados)
    });

    const resultado = await resposta.json();

    if (resultado.status === "success") {
        limparFormulario();
        buscarPosts();
    } else {
        alert("Erro ao processar: " + resultado.message);
    }
}

function prepararEdicao(id, titulo, conteudo) {
    idEdicao = id;
    document.getElementById('titulo').value = titulo;
    document.getElementById('conteudo').value = conteudo;
    document.querySelector('#novo-post h2').innerText = "Editando Postagem";
    document.querySelector('#novo-post button').innerText = "Salvar Alterações";
    window.scrollTo(0, 0); 
}

function limparFormulario() {
    idEdicao = null;
    document.getElementById('titulo').value = "";
    document.getElementById('conteudo').value = "";
    document.querySelector('#novo-post h2').innerText = "Nova Postagem";
    document.querySelector('#novo-post button').innerText = "Publicar no Blog";
}

async function excluirPost(id) {
    if (confirm("Tem certeza que deseja apagar esta postagem permanentemente?")) {
        const resposta = await fetch('controller/excluir_post.php', {
            method: 'POST',
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ id: id })
        });

        const resultado = await resposta.json();

        if (resultado.status === "success") {
            buscarPosts();
        } else {
            alert("Erro ao excluir: " + resultado.message);
        }
    }
}

buscarPosts();