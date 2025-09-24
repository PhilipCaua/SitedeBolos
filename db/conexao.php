<?php
// os códigos para linkar o banco de dados é sempre o mesmo
$host = "localhost";
$banco = "bolos";
$usuario = "root";
$senha = "";
// criar conexão 
$conexao = new mysqli($host, $usuario, $senha, $banco);
// Validar a conexão
if ($conexao->connect_errno) {
    die("Falha na conexão " . $conexao->connect_error);
}