<div class="container"><?php
include 'db.php';
if (!isset($_GET['id'])) {
    header('Location: lista.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM aluguel WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$appointment) {
    header('Location: lista.php');
    exit;
}

$nome = $appointment ['nome'];
$email = $appointment ['email'];
$telefone = $appointment ['telefone'];
$data = $appointment ['data'];
$carro = $appointment ['carro'];
$tempo = $appointment ['tempo'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar compras</title>
</head>
<body>
    <h1>Atualizar compras</h1>
    <form method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?php echo $nome; ?>" required><br>

    <label for="tamanho">Tamanho:</label>
    <input type="text" name="tamanho" value="<?php echo $tamanho; ?>" required><br>

    <label for="peso">Peso:</label>
    <input type="text" name="peso" value="<?php echo $peso; ?>" required><br>

    <label for="quantidade">Quantidade:</label>
    <input type="text" name="quantidade" value="<?php echo $quantidade; ?>" required><br>

    <label for="preco">Preço:</label>
    <input type="text" name="preco" value="<?php echo $preco; ?>" required><br>

    <button type="submit">Atualizar</button>
</form>
</body>

</html>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$nome = $_POST ['nome'];
$email = $_POST ['email'];
$telefone = $_POST ['telefone'];
$data = $_POST ['data'];
$carro = $_POST['carro'];
$tempo = $_POST ['tempo'];

    //validação dos dados dop formulário aqui
    $stmt = $pdo->prepare('UPDATE aluguel SET nome = ?, email = ?, telefone = ?, data = ?, carro = ?, tempo = ?,  = ? WHERE id = ?');
    $stmt->execute([$nome, $tamanho, $peso, $quantidade, $preco, $id]);
    header('Location: lista.php');
    exit;
}
?>