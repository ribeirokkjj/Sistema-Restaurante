<?php

include "../infra/conexao.php";

$usuario = $_POST["usuario"];
$email = $_POST["email"];

$sql = "INSERT INTO usuario (usuario, email,) VALUES ('$usuario','$email')";

mysqli_query($conexao, $sql);

header("Location: ../index.php");
?>