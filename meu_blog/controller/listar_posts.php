<?php
require_once("../model/conexao.php");

$sql = "SELECT p.*, u.nome FROM postagens p INNER JOIN usuarios u ON p.usuario_id = u.id ORDER BY p.id DESC";
$resultado = $conexao->query($sql);

$posts = [];
if ($resultado) {
    while ($linha = $resultado->fetch_assoc()) {
        $posts[] = $linha;
    }
}

echo json_encode($posts);
