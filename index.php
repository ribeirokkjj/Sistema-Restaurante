<?php

include "infra/conexao.php";

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

    <!-- <main>
        <h2>Adicione um novo usuario!</h2>
        <form action="public/cadastrar.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome">
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email">
            <br>
            <button type="submit">Cadastrar</button>
            <button type="button" onclick="window.location.href='public/pratos.php'">Ir para pratos</button>
            
        </form>
        </div> -->

         <main>
        <h2>Login</h2>
        <form action="" method="POST">
            <label for="nome">Nome:</label>
            <input required type="text" name="nome">
            <br>
            <label for="email">Email:</label>
            <input required type="email" name="email">
            <br>
            <button type="submit">Login</button>
        </form>
        </div>

        <div>
            <?php

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $email = $_POST['email'] ?? '';
                $nome = $_POST['nome'] ?? '';
                
                $stmt = $conexao->prepare("SELECT id, nome, email FROM usuario WHERE email = ? AND nome = ?");
                $stmt->bind_param("ss", $email, $nome);
                $stmt->execute();

                $resultado = $stmt->get_result();

                // 2. Verifica se o e-mail foi encontrado
                if ($usuario = $resultado->fetch_assoc()) {      
                    // Login correto! Regenera o ID da sessão por segurança
                    session_regenerate_id(true);

                    // Salva os dados do usuário na sessão
                    $_SESSION['usuario_id'] = $usuario['id'];
                    $_SESSION['usuario_nome'] = $usuario['nome'];
                    $_SESSION['logado'] = true;

                    header('Location: dashboard.php');

                    if ($stmt->execute()) {
                        echo "Usuário cadastrado com sucesso!";
                        echo "<br><a href='../index.php'>Ir para a tela de login</a>";
                    } else {
                        echo "Erro ao cadastrar usuário: " . $conexao->error;
                    }

                    exit;
                }
            }
            ?>
        </div>
    </main>
</body>
</html>