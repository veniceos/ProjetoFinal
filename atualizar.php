
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

<!DOCTYPE html>
<html>
<head>
     <title>Atualizar tarefa</title>
</head>
<body>
     

    <h1>Atualizar tarefa</h1>
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
<input type="text" name="carro" required><br>

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