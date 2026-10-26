
<?php
require_once('classe7.php');

$resultado = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $empresa = new ControleFinanceiro();

    $receita = (float) $_POST['receita'];
    $aluguel = (float) $_POST['aluguel'];
    $funcionarios = (float) $_POST['funcionarios'];
    $energiaInternet = (float) $_POST['energiaInternet'];
    $outrasDespesas = (float) $_POST['outrasDespesas'];

    $despesas = $empresa->calcularDespesas($aluguel, $funcionarios, $energiaInternet, $outrasDespesas);
    $saldo = $empresa->calcularResultado($receita, $despesas);
    $situacao = $empresa->verificarSituacao($saldo);
    $margem = $empresa->calcularMargemLucro($receita, $saldo);

    $resultado = "
        <h2>Controle Financeiro</h2>
        <p>Receita total: R$ " . number_format($receita, 2, ',', '.') . "</p>
        <p>Despesas totais: R$ " . number_format($despesas, 2, ',', '.') . "</p>
        <p>Lucro ou prejuízo: R$ " . number_format($saldo, 2, ',', '.') . "</p>
        <p>Situação: $situacao</p>
        <p>Margem de lucro: " . number_format($margem, 2, ',', '.') . "%</p>
    ";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Controle Financeiro</title>
    <link rel="stylesheet" href="7.css">
</head>
<body>
    <h1>Controle Financeiro da Empresa</h1>

    <form method="POST">
        <label>Receita mensal:</label>
        <input type="number" name="receita" min="0" step="0.01" required>
        <br><br>

        <label>Aluguel:</label>
        <input type="number" name="aluguel" min="0" step="0.01" required>
        <br><br>

        <label>Gastos com funcionários:</label>
        <input type="number" name="funcionarios" min="0" step="0.01" required>
        <br><br>

        <label>Gastos com energia e internet:</label>
        <input type="number" name="energiaInternet" min="0" step="0.01" required>
        <br><br>

        <label>Outras despesas:</label>
        <input type="number" name="outrasDespesas" min="0" step="0.01" required>
        <br><br>

        <button type="submit">Calcular resultado</button>
    </form>

    <?= $resultado ?>
</body>
</html>
