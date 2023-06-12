
<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Venda de Frutas</title>
</head>

    <h1>Venda de Frutas</h1>

    <?php
    $stmt = $pdo->query('SELECT * FROM aluguel ORDER BY nome, tempo');
    $aluguel = $stmt->fetchALL(PDO::FETCH_ASSOC);

    if (count($aluguel)==0) {
        echo '<p>Nenhum aluguel comprado.</p>';
}else{
    echo '<table border="1">';
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
