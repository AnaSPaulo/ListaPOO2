
<?php
require_once('classe4.php');

$resultado = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vendedor = new Comissao();

    $nome = $_POST['nome'];
    $totalVendido = (float) $_POST['totalVendido'];
    $percentualComissao = (float) $_POST['percentualComissao'];
    $salarioFixo = (float) $_POST['salarioFixo'];

    $comissao = $vendedor->calcularComissao($totalVendido, $percentualComissao);
    $bonus = $vendedor->calcularBonus($totalVendido);
    $salarioTotal = $vendedor->calcularSalarioTotal($salarioFixo, $comissao, $bonus);

    $resultado = "
        <h2>Resumo das Vendas</h2>
        <p>Vendedor: $nome</p>
        <p>Total vendido: R$ " . number_format($totalVendido, 2, ',', '.') . "</p>
        <p>Comissão calculada: R$ " . number_format($comissao, 2, ',', '.') . "</p>
        <p>Bônus: R$ " . number_format($bonus, 2, ',', '.') . "</p>
        <p>Salário total: R$ " . number_format($salarioTotal, 2, ',', '.') . "</p>
    ";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Comissão de Vendas</title>
    <link rel="stylesheet" href="4.css">
</head>
<body>
    <h1>Comissão de Vendas</h1>

    <form method="POST">
        <label>Nome do vendedor:</label>
        <input type="text" name="nome" required>
        <br><br>

        <label>Total vendido no mês:</label>
        <input type="number" name="totalVendido" min="0" step="0.01" required>
        <br><br>

        <label>Percentual de comissão:</label>
        <input type="number" name="percentualComissao" min="0" step="0.01" required>
        <br><br>

        <label>Salário fixo:</label>
        <input type="number" name="salarioFixo" min="0" step="0.01" required>
        <br><br>

        <button type="submit">Calcular salário</button>
    </form>

    <?= $resultado ?>
</body>
</html>
