<?php
require_once("../model/conexao.php");

$json = file_get_contents("php://input");
$dados = json_decode($json, true);

if (isset($dados['id']) && $dados['id'] !== null) {
    $id = intval($dados['id']);
    $titulo = $conexao->real_escape_string($dados['titulo']);
    $conteudo = $conexao->real_escape_string($dados['conteudo']);

    $sql = "UPDATE postagens SET titulo = '$titulo', conteudo = '$conteudo' WHERE id = $id";

    if ($conexao->query($sql)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conexao->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Dados incompletos para edição."]);
}
