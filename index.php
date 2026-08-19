<?php
include "infra/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    
    if (!empty($email) && !empty($nome)) {
        $stmt = $conexao->prepare("SELECT id, nome, email FROM usuario WHERE email = ? AND nome = ?");
        $stmt->bind_param("ss", $email, $nome);
        $stmt->execute();

        $resultado = $stmt->get_result();

        if ($usuario = $resultado->fetch_assoc()) {      
            session_regenerate_id(true);

            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['logado'] = true;

            header('Location: public/pratos.php');
            exit;
        } else {
            $erro = "Nome ou E-mail incorretos!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Restaurante</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <header>
        <h1>CRUD - Restaurante</h1>
    </header>

    <main>
        <h2>Login</h2>

        <?php if (!empty($erro)): ?>
            <p> <?php echo $erro; ?></p>
        <?php endif; ?>

        <form action="" method="POST">
            <label for="nome">Nome:</label>
            <input required type="text" name="nome" id="nome">
            <br><br>
            
            <label for="email">Email:</label>
            <input required type="email" name="email" id="email">
            <br><br>
            
            <button type="submit">Login</button>
        </form>
    </main>
</body>
</html>