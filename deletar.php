<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header('Location: lista.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT *FROM aluguel WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: lista.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('DELETE FROM aluguel WHERE id = ?');
    $stmt->execute([$id]);

    header('Location: lista.php');
    exit;
}

?>
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
        <div class="log"><img src="Imagens/vetor perfil.png"></div>
    </div>
    </header>
    <div class="form3">
    <h1>Cancelar Compra</h1>
    <p>Tem certeza que deseja cancelar sua a compra de
    <?php echo $appointment['nome']; ?>?</p>
    <form method="post">
        <button type="submit">Sim</button>
        <a href="lista.php">Não</a>
</div>
</form>        
</body>
</html>