<?php 
require_once 'db.php';

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
                $stmt = $pdo->prepare('INSERT INTO aluguel (nome, email, telefone, data, carro, tempo)
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

<section>

<P class="ttl-c">ALUGAR</p>
    <div class="form1">
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
<select name="carro">
<option value="Fiat Uno 1999">Fiat Uno 1999</option>
<option value="Gol G2">Gol G2</option>
<option value="Tesla Twitter">Tesla Twitter</option></select><br>

<label for="tempo">tempo:</label>
<input type="text" name="tempo" required><br>

    <div>

    <button class="submit" type="submit" name="submit" value="Agendar">Agendar</button>
    <button><a href="lista.php">Listar</a></button>
    </div>
    </form>
    </div>
    </section>
</body>
</html>