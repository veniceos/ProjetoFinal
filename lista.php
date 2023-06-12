
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
        <div class="log"><img src="Imagens/vetor perfil.png"></div>
    </div>
    </header>


    <div class="form2">
    <?php
    $stmt = $pdo->query('SELECT * FROM aluguel ORDER BY nome, tempo');
    $aluguel = $stmt->fetchALL(PDO::FETCH_ASSOC);

    if (count($aluguel)==0) {
        echo '<p>Nenhum carro alugado.</p>';
}else{
    echo '<table border=1>';
    echo '<thead><tr><th>Nome</th><th>Email</th><th>Telefone</th><th>Data</th><th>Carro</th><th>Tempo</th><th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($aluguel as $aluguel) {
        echo '<tr>';
        echo '<td>' . $aluguel['nome'] . '</td>';
        echo '<td>' . $aluguel['email'] . '</td>';
        echo '<td>' . $aluguel['telefone'] . '</td>';
        echo '<td>' . $aluguel['data'] . '</td>';
        echo '<td>' . $aluguel['carro'] . '</td>';
        echo '<td>' . $aluguel['tempo'] . '</td>';
        echo '<td><a class="btt" href="atualizar.php?id=' .
        $aluguel['id'] . '">Atualizar</a></td>';
        echo '<td><a class="btt" href="deletar.php?id=' .
        $aluguel['id'] . '">Deletar</a></td>';
        

    }

    echo '</tbody>';
    echo '</table>';
    }
?>    
</div>
</body>
</html>
