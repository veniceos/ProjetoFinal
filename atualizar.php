<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluguel</title>
    <link rel="stylesheet" href="./CSS/styl.css">
</head>
<body>
<div class="princ">
<header>
    <img src="Imagens/vetor menu.png" class="menu-i"> </img>
    <div class="logo"><a href="index.php"><img src="Imagens/logo.png" class="log"></img></a></div>
        <div class="log"><img src="Imagens/vetor perfil.png"></img></div>
    </div>
    </header>

        <?php
        include 'db.php';
        if (!isset($_GET['id'])) {
            header('Location: lista.php');
            exit;
        }
        $id = $_GET['id'];

        $stmt = $pdo->prepare('SELECT * FROM aluguel WHERE id = ?');
        $stmt->execute([$id]);
        $appointment = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$appointment) {
            header('Location: lista.php');
            exit;
        } 
        $nome = $appointment['nome'];
        $telefone = $appointment['telefone'];
        $email = $appointment['email'];
        $data = $appointment['data'];
        $carro = $appointment['carro'];
        $tempo = $appointment['tempo'];
        ?>

        <p class="ttl-c">ATUALIZAR</p>
        <div class="form1">
            <form method="POST" action="">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="<?php echo $nome; ?>" required><br>

                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $email; ?>" required><br>

                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" value="<?php echo $telefone; ?>" required><br>

                <label for="data">Data:</label>
                <input type="date" name="data" value="<?php echo $data; ?>" required><br>

                <label for="carro">Carro:</label>
                <input type="text" name="carro" value="<?php echo $carro; ?>" required><br>

                <label for="tempo">Tempo:</label>
                <input type="text" name="tempo" value="<?php echo $tempo; ?>" required><br>
                
                <button type="submit">Atualizar</button>
            </form>
        </div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $data = $_POST['data'];
        $carro = $_POST['carro'];
        $tempo = $_POST['tempo'];

        $stmt = $pdo->prepare('UPDATE aluguel SET nome = ?, email = ?, telefone = ?, data = ?, carro = ?, tempo = ? WHERE id = ?');
        $stmt->execute([$nome, $email, $telefone, $data, $carro, $tempo, $id]);
        header('Location: lista.php');
        exit;
    }
    ?>
</body>
</html>
