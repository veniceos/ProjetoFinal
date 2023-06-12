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

<P class="ttl-c">ATUALIZAR</p>
    <div class="form1">
<form>
    <label for="nome">Nome:</label>
<input type="text" name="nome" required><br>

<label for="email">email:</label>
<input type="text" name="email" required><br>

<label for="telefone">telefone:</label>
<input type="text" name="telefone" required><br>

<label for="data">data:</label>
<input type="date" name="data" required><br>

<label for="carro">carro:</label>
<select name="carro">
<option value="Fiat Uno 1999">Fiat Uno 1999</option>
<option value="Gol G2">Gol G2</option>
<option value="Tesla Twitter">Tesla Twitter</option></select><br>

<label for="tempo">tempo:</label>
<input type="text" name="tempo" required><br>
    
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome=$_POST['nome'];
        $email=$_POST['email'];
        $telefone=$_POST['telefone'];
        $dataa=$_POST['data'];
        $carro=$_POST['carro'];
        $tempo=$_POST['tempo'];

$stmt = $pdo->prepare('UPDATE aluguel SET nome = ?, email = ?, telefone = ?, data = ?, carro = ?, tempo = ? WHERE id = ?');
$stmt->execute([$nome, $email, $telefone, $data, $carro, $tempo, $id]);
header('Location: lista.php');
exit;
}
?>
</div>