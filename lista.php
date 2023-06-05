<div class="container">
<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="styl.css">
    <title>Venda de Frutas</title>
</head>

    <h1>Venda de Frutas</h1>

    <?php
    $stmt = $pdo->query('SELECT * FROM aluguel ORDER BY nome, tempo');
    $aluguels = $stmt->fetchALL(PDO::FETCH_ASSOC);

    if (count($aluguel)==0) {
        echo '<p>Nenhum aluguel comprado.</p>';
}else{
    echo '<table border="1">';
    echo '<thead><tr><th>Nome</th><th>Tamanho</th><th>Peso</th><th>Quantidade</th><th>Preço</th><th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($aluguels as $aluguel) {
        echo '<tr>';
        echo '<td>' . $aluguel['nome'] . '</td>';
        echo '<td>' . $aluguel['emial'] . '</td>';
        echo '<td>' . $aluguel['telefone'] . '</td>';
        echo '<td>' . $aluguel['data'] . '</td>';
        echo '<td>' . $aluguel['carro'] . '</td>';
        echo '<td>' . $aluguel['tempo'] . '</td>';
        echo '<td><a style="color:black;" href="atualizar.php?id=' .
        $aluguel['id'] . '">Atualizar</a></td>';
        echo '<td><a style="color:black;" href="deletar.php?id=' .
        $aluguel['id'] . '">Deletar</a></td>';
        

    }

    echo '</tbody>';
    echo '</table>';
    }
?>    
</body>
</html>
