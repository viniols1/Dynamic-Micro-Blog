<?php
require_once("../model/conexao.php");

$json = file_get_contents("php://input");
$dados = json_decode($json, true);

if (isset($dados['id'])) {
    $id = intval($dados['id']);

    $sql = "DELETE FROM postagens WHERE id = $id";

    if ($conexao->query($sql)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conexao->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "ID não fornecido."]);
}
