<?php 
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Venda de Frutas</title>
</head>
<body>
    <div class="container">
        <h1></h1>
        <?php 
        if (isset($_POST['submit'])){
            $nome = $_POST ['nome'];
            $email = $_POST ['email'];
            $telefone = $_POST ['telefone'];
            $data = $_POST ['data'];
            $carro = $_POST['carro'];
            $tempo = $_POST ['tempo'];
            
            $stmt = $pdo->prepare('SELECT COUNT(*) FROM aluguel WHERE nome = ? AND tempo = ?');
            $stmt->execute([$nome, $data]);
            $count = $stmt->fetchColumn();
            
            if ($count > 0){
                $error = 'Nossa loja possui uma grande variedade de frutas para você';}
            else{
                $stmt = $pdo->prepare('INSERT INTO produtos (nome, email, telefone, data, carro, tempo)
                VALUES (:nome, :email, :telefone, :data, :carro, :tempo)');
                $stmt->execute(['nome' => $nome, 'email' => $email, 'telefone' => $telefone,
                'data' => $data, 'carro' =>$carro, 'tempo' => $tempo]);

                if ($stmt->rowCount()){
                    echo '<span>Compra realizada com sucesso!</span>';
                }else{
                    echo '<span>Eroo ao realizar a compra. Tente novamente mais tarde!</span>';
                }

            }

            if (isset($error)) {
                echo '<span>' . $error . '</span>';
            }
        }
?>

<form method="post">

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

    <div>

    <button type="submit" name="submit" value="Agendar">Agendar</button>
    <button><a href="lista.php">Listar</a></button>
    </div>

    </form>
</body>
</html>