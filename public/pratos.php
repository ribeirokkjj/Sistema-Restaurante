<?php

include "../infra/conexao.php";
$usuario = mysqli_query($conexao, "SELECT * FROM usuario");
$pratos = mysqli_query($conexao, "SELECT * FROM pratos");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - restaurante</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <header>
        <h1>CRUD - Restaurante</h1>
    </header>

    <main>
        <h2>Adicione um novo prato!</h2>
        <form action="cadastrar_prato.php" method="POST">
            <label for="nome_prato">Nome do prato:</label>
            <input type="text" name="nome_prato">
            <br>
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao">
            <br>
             <label for="preco">preço:</label>
            <input type="text" name="preco">
            <br>
             <label for="categoria">categoria:</label>
            <input type="text" name="categoria">
            <br>
            <button type="submit">adicionar</button>
        </form>
        </div>
         <div>
            <h2>Pratos cadastrados</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
                <?php while ($pratos = mysqli_fetch_assoc($pratos)) { ?>
                    <tr>
                        <td><?php echo $pratos["id"] ?></td>
                        <td><?php echo $pratos["nome"] ?></td>
                        <td><?php echo $pratos["descrição"] ?></td>
                        <td><?php echo $pratos["preço"] ?></td>
                        <td><?php echo $pratos["categoria"] ?></td>
                        </td>
                    </tr>

      <?php } ?>
    </main>
</body>
</html>