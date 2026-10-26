
<?php
require_once('classe6.php');

$resultado = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entrega = new Entrega();

    $distancia = (float) $_POST['distancia'];
    $valorKm = (float) $_POST['valorKm'];
    $peso = (float) $_POST['peso'];
    $taxaKg = (float) $_POST['taxaKg'];
    $valorProdutos = (float) $_POST['valorProdutos'];

    $custoDistancia = $entrega->calcularCustoDistancia($distancia, $valorKm);
    $taxaPeso = $entrega->calcularTaxaPeso($peso, $taxaKg);
    $frete = $entrega->calcularFrete($custoDistancia, $taxaPeso);
    $desconto = $entrega->calcularDesconto($valorProdutos, $frete);
    $freteFinal = $entrega->calcularFreteFinal($frete, $desconto);
    $totalCompra = $entrega->calcularTotalCompra($valorProdutos, $freteFinal);

    $resultado = "
        <h2>Resumo da Entrega</h2>
        <p>Custo por distância: R$ " . number_format($custoDistancia, 2, ',', '.') . "</p>
        <p>Taxa por peso: R$ " . number_format($taxaPeso, 2, ',', '.') . "</p>
        <p>Desconto aplicado: R$ " . number_format($desconto, 2, ',', '.') . "</p>
        <p>Valor final do frete: R$ " . number_format($freteFinal, 2, ',', '.') . "</p>
        <p>Total da compra com frete: R$ " . number_format($totalCompra, 2, ',', '.') . "</p>
    ";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cálculo de Frete</title>
    <link rel="stylesheet" href="6.css">
</head>
<body>
    <h1>Cálculo de Frete</h1>

    <form method="POST">
        <label>Distância da entrega em quilômetros:</label>
        <input type="number" name="distancia" min="0" step="0.01" required>
        <br><br>

        <label>Valor cobrado por quilômetro:</label>
        <input type="number" name="valorKm" min="0" step="0.01" required>
        <br><br>

        <label>Peso da mercadoria em quilogramas:</label>
        <input type="number" name="peso" min="0" step="0.01" required>
        <br><br>

        <label>Taxa adicional por quilograma:</label>
        <input type="number" name="taxaKg" min="0" step="0.01" required>
        <br><br>

        <label>Valor dos produtos transportados:</label>
        <input type="number" name="valorProdutos" min="0" step="0.01" required>
        <br><br>

        <button type="submit">Calcular frete</button>
    </form>

    <?= $resultado ?>
</body>
</html>
