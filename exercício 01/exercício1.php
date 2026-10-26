
<?php
require_once('classe1.php');

$resultado = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $caixa = new Caixa();

    $nomeProduto = $_POST['nomeProduto'];
    $quantidade = (int) $_POST['quantidade'];
    $precoUnitario = (float) $_POST['precoUnitario'];
    $percentualDesconto = (float) $_POST['percentualDesconto'];
    $valorPago = (float) $_POST['valorPago'];

    $valorBruto = $caixa->calcularValorBruto($quantidade, $precoUnitario);
    $desconto = $caixa->calcularDesconto($valorBruto, $percentualDesconto);
    $totalPagar = $caixa->calcularTotal($valorBruto, $desconto);
    $pagamento = $caixa->calcularPagamento($valorPago, $totalPagar);

    $resultado = "
        <h2>Resumo da venda</h2>
        <p>Produto: $nomeProduto</p>
        <p>Valor bruto: R$ " . number_format($valorBruto, 2, ',', '.') . "</p>
        <p>Valor do desconto: R$ " . number_format($desconto, 2, ',', '.') . "</p>
        <p>Total a pagar: R$ " . number_format($totalPagar, 2, ',', '.') . "</p>
        <p>Valor pago: R$ " . number_format($valorPago, 2, ',', '.') . "</p>
        <p>$pagamento</p>
    ";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Caixa</title>
    <link rel="stylesheet" href="1.css">
</head>
<body>
    <h1>Sistema de Caixa</h1>

    <form method="POST">
        <label>Nome do produto:</label>
        <input type="text" name="nomeProduto" required>
        <br><br>

        <label>Quantidade vendida:</label>
        <input type="number" name="quantidade" min="1" required>
        <br><br>

        <label>Preço unitário:</label>
        <input type="number" name="precoUnitario" min="0" step="0.01" required>
        <br><br>

        <label>Percentual de desconto:</label>
        <input type="number" name="percentualDesconto" min="0" max="100" step="0.01" required>
        <br><br>

        <label>Valor pago pelo cliente:</label>
        <input type="number" name="valorPago" min="0" step="0.01" required>
        <br><br>

        <button type="submit">Calcular venda</button>
    </form>

    <?= $resultado ?>
</body>
</html>
