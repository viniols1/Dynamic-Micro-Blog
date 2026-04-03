<?php require_once("../model/conexao.php");

$sql = "SELECT p.*, u.nome FROM postagens p INNER JOIN usuarios u ON p.usuario_id = u.id ORDER BY p.data_criacao DESC";
$resultado = $conexao->query($sql);
$posts = $resultado->fetch_all(MYSQLI_ASSOC);

echo json_encode($posts);
