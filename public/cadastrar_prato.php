<?php

include "../infra/conexao.php";

$nome_prato = $_POST["nome_prato"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$categoria = $_POST["categoria"];

$sql = "INSERT INTO pratos (nome, descricao, preco, categoria) VALUES ('$nome_prato','$descricao', '$preco', '$categoria')";

mysqli_query($conexao, $sql);

header("Location: pratos.php");
?>