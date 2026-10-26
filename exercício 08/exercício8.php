
<?php
require_once('classe8.php');

$resultado = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $compra = new CompraMateriais();

    $quantidadeCadernos = (int) $_POST['quantidadeCadernos'];
    $precoCaderno = (float) $_POST['precoCaderno'];
    $quantidadeCanetas = (int) $_POST['quantidadeCanetas'];
    $precoCaneta = (float) $_POST['precoCaneta'];
    $quantidadePapel = (int) $_POST['quantidadePapel'];
    $precoPapel = (float) $_POST['precoPapel'];
    $orcamento = (float) $_POST['orcamento'];

    $custoCadernos = $compra->calcularCusto($quantidadeCadernos, $precoCaderno);
    $custoCanetas = $compra->calcularCusto($quantidadeCanetas, $precoCaneta);
    $custoPapel = $compra->calcularCusto($quantidadePapel, $precoPapel);

    $total = $compra->calcularTotal($custoCadernos, $custoCanetas, $custoPapel);
    $saldo = $compra->calcularSaldo($orcamento, $total);
    $percentual = $compra->calcularPercentualExcedido($orcamento, $total);
    $situacao = $compra->verificarOrcamento($saldo);

    $resultado = "
        <h2>Resumo da Compra</h2>
        <p>Custo dos cadernos: R$ " . number_format($custoCadernos, 2, ',', '.') . "</p>
        <p>Custo das canetas: R$ " . number_format($custoCanetas, 2, ',', '.') . "</p>
        <p>Custo das resmas de papel: R$ " . number_format($custoPapel, 2, ',', '.') . "</p>
        <p>Valor total da compra: R$ " . number_format($total, 2, ',', '.') . "</p>
        <p>Saldo do orçamento: R$ " . number_format($saldo, 2, ',', '.') . "</p>
        <p>Situação: $situacao</p>
    ";

    if ($total > $orcamento && $orcamento > 0) {
        $resultado .= "<p>Percentual excedido: " . number_format($percentual, 2, ',', '.') . "%</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Compra de Materiais</title>
    <link rel="stylesheet" href="8.css">
</head>
<body>
    <h1>Compra de Materiais de Escritório</h1>

    <form method="POST">
        <h3>Cadernos</h3>
        <label>Quantidade:</label>
        <input type="number" name="quantidadeCadernos" min="0" required>
        <br><br>

        <label>Preço unitário:</label>
        <input type="number" name="precoCaderno" min="0" step="0.01" required>
        <br><br>

        <h3>Canetas</h3>
        <label>Quantidade:</label>
        <input type="number" name="quantidadeCanetas" min="0" required>
        <br><br>

        <label>Preço unitário:</label>
        <input type="number" name="precoCaneta" min="0" step="0.01" required>
        <br><br>

        <h3>Resmas de papel</h3>
        <label>Quantidade:</label>
        <input type="number" name="quantidadePapel" min="0" required>
        <br><br>

        <label>Preço unitário:</label>
        <input type="number" name="precoPapel" min="0" step="0.01" required>
        <br><br>

        <label>Orçamento disponível:</label>
        <input type="number" name="orcamento" min="0" step="0.01" required>
        <br><br>

        <button type="submit">Calcular compra</button>
    </form>

    <?= $resultado ?>
</body>
</html>
