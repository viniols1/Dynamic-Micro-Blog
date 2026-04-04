<?php
$conexao = new mysqli("localhost", "root", "", "micro_blog");

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

$conexao->set_charset("utf8mb4");
