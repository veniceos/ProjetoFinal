<?php include 'db.php'; ?>

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


    <div class="form2">
    <?php
    $stmt = $pdo->query('SELECT * FROM aluguel ORDER BY nome, tempo');
    $aluguel = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($aluguel)==0) {
        echo '<p>Nenhum carro alugado.</p>';
}else{
    echo '<table border=1>';
    echo '<thead><tr><th>Nome</th><th>Email</th><th>Telefone</th><th>Data</th><th>Carro</th><th>Tempo</th><th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($aluguel as $alugueis) {
        echo '<tr>';
        echo '<td>' . $alugueis['nome'] . '</td>';
        echo '<td>' . $alugueis['email'] . '</td>';
        echo '<td>' . $alugueis['telefone'] . '</td>';
        echo '<td>' . $alugueis['data'] . '</td>';
        echo '<td>' . $alugueis['carro'] . '</td>';
        echo '<td>' . $alugueis['tempo'] . '</td>';
        echo '<td><a class="btt" href="atualizar.php?id=' .
        $alugueis['id'] . '">Atualizar</a></td>';
        echo '<td><a class="btt" href="deletar.php?id=' .
        $alugueis['id'] . '">Deletar</a></td></tr>';
        

    }

    echo '</tbody>';
    echo '</table>';
    }
?> <br>  </div>
<div class="algl"><a class="algl1" href="edit.php">Alugar!</a></div>

</body>
</html>