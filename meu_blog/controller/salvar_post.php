<?php
require_once("../model/conexao.php");

$json = file_get_contents("php://input");
$dados = json_decode($json, true);

if ($dados) {
    $titulo = $conexao->real_escape_string($dados['titulo']);
    $conteudo = $conexao->real_escape_string($dados['conteudo']);
    $usuario_id = 1;

    $sql = "INSERT INTO postagens (titulo, conteudo, usuario_id) VALUES ('$titulo', '$conteudo', $usuario_id)";

    if ($conexao->query($sql)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conexao->error]);
    }
}
