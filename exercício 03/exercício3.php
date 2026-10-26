
<?php
require_once('classe3.php');

$resultado = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $estoque = new Estoque();

    $nomeProduto = $_POST['nomeProduto'];
    $quantidade = (int) $_POST['quantidade'];
    $precoCusto = (float) $_POST['precoCusto'];
    $estoqueMinimo = (int) $_POST['estoqueMinimo'];
    $quantidadeCompra = (int) $_POST['quantidadeCompra'];

    $valorEstoque = $estoque->calcularValorEstoque($quantidade, $precoCusto);
    $situacao = $estoque->verificarEstoque($quantidade, $estoqueMinimo);
    $reposicao = $estoque->calcularReposicao($quantidade, $estoqueMinimo);
    $custoCompra = $estoque->calcularCustoCompra($quantidadeCompra, $precoCusto);

    $resultado = "
        <h2>Controle de Estoque</h2>
        <p>Produto: $nomeProduto</p>
        <p>Valor do estoque atual: R$ " . number_format($valorEstoque, 2, ',', '.') . "</p>
        <p>Situação: $situacao</p>
        <p>Quantidade recomendada para reposição: $reposicao unidades</p>
        <p>Custo total da compra informada: R$ " . number_format($custoCompra, 2, ',', '.') . "</p>
    ";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Controle de Estoque</title>
    <link rel="stylesheet" href="3.css">
</head>
<body>
    <h1>Controle de Estoque</h1>

    <form method="POST">
        <label>Nome do produto:</label>
        <input type="text" name="nomeProduto" required>
        <br><br>

        <label>Quantidade em estoque:</label>
        <input type="number" name="quantidade" min="0" required>
        <br><br>

        <label>Preço de custo por unidade:</label>
        <input type="number" name="precoCusto" min="0" step="0.01" required>
        <br><br>

        <label>Estoque mínimo desejado:</label>
        <input type="number" name="estoqueMinimo" min="0" required>
        <br><br>

        <label>Quantidade que será comprada:</label>
        <input type="number" name="quantidadeCompra" min="0" required>
        <br><br>

        <button type="submit">Verificar estoque</button>
    </form>

    <?= $resultado ?>
</body>
</html>
