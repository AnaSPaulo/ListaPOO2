
<?php
require_once('classe5.php');

$resultado = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $orcamento = new Orcamento();

    $nomeCliente = $_POST['nomeCliente'];
    $valorPecas = (float) $_POST['valorPecas'];
    $quantidadeHoras = (float) $_POST['quantidadeHoras'];
    $valorHora = (float) $_POST['valorHora'];
    $percentualDesconto = (float) $_POST['percentualDesconto'];

    $maoDeObra = $orcamento->calcularMaoDeObra($quantidadeHoras, $valorHora);
    $subtotal = $orcamento->calcularSubtotal($valorPecas, $maoDeObra);
    $desconto = $orcamento->calcularDesconto($subtotal, $percentualDesconto);
    $total = $orcamento->calcularTotal($subtotal, $desconto);
    $aprovacao = $orcamento->verificarAprovacao($total);

    $resultado = "
        <h2>Orçamento de Serviços</h2>
        <p>Cliente: $nomeCliente</p>
        <p>Valor das peças: R$ " . number_format($valorPecas, 2, ',', '.') . "</p>
        <p>Valor da mão de obra: R$ " . number_format($maoDeObra, 2, ',', '.') . "</p>
        <p>Valor do desconto: R$ " . number_format($desconto, 2, ',', '.') . "</p>
        <p>Total do orçamento: R$ " . number_format($total, 2, ',', '.') . "</p>
        <p>$aprovacao</p>
    ";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Orçamento de Serviços</title>
    <link rel="stylesheet" href="5.css">
</head>
<body>
    <h1>Orçamento de Serviços</h1>

    <form method="POST">
        <label>Nome do cliente:</label>
        <input type="text" name="nomeCliente" required>
        <br><br>

        <label>Valor das peças:</label>
        <input type="number" name="valorPecas" min="0" step="0.01" required>
        <br><br>

        <label>Quantidade de horas de serviço:</label>
        <input type="number" name="quantidadeHoras" min="0" step="0.01" required>
        <br><br>

        <label>Valor cobrado por hora:</label>
        <input type="number" name="valorHora" min="0" step="0.01" required>
        <br><br>

        <label>Percentual de desconto:</label>
        <input type="number" name="percentualDesconto" min="0" max="100" step="0.01" required>
        <br><br>

        <button type="submit">Calcular orçamento</button>
    </form>

    <?= $resultado ?>
</body>
</html>
