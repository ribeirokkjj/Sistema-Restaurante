<?php

include "infra/conexao.php";
$usuario = mysqli_query($conexao, "SELECT * FROM usuario");
$pratos = mysqli_query($conexao, "SELECT * FROM pratos");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Livraria</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <header>
        <h1>CRUD - Restaurante</h1>
    </header>

    <main>
        <h2>Adicione um novo usuario!</h2>
        <form action="public/cadastrar.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome">
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email">
            <br>
            <button type="submit">Cadastrar</button>
        </form>
            </table>
        </div>

        <div>
            <?php

            ?>
        </div>
    </main>
</body>
</html>