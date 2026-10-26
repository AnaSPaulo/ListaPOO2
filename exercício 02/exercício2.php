
<?php
require_once('classe2.php');

$resultado = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $folha = new FolhaPagamento();

    $nome = $_POST['nome'];
    $valorHora = (float) $_POST['valorHora'];
    $horasNormais = (float) $_POST['horasNormais'];
    $horasExtras = (float) $_POST['horasExtras'];

    $salarioNormal = $folha->calcularSalarioNormal($valorHora, $horasNormais);
    $valorHorasExtras = $folha->calcularHorasExtras($valorHora, $horasExtras);
    $salarioBruto = $folha->calcularSalarioBruto($salarioNormal, $valorHorasExtras);
    $aviso = $folha->verificarHorasExtras($horasExtras);

    $resultado = "
        <h2>Folha de Pagamento</h2>
        <p>Funcionário: $nome</p>
        <p>Salário normal: R$ " . number_format($salarioNormal, 2, ',', '.') . "</p>
        <p>Valor das horas extras: R$ " . number_format($valorHorasExtras, 2, ',', '.') . "</p>
        <p>Salário bruto: R$ " . number_format($salarioBruto, 2, ',', '.') . "</p>
        <p>$aviso</p>
    ";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Folha de Pagamento</title>
    <link rel="stylesheet" href="2.css">
</head>
<body>
    <h1>Folha de Pagamento</h1>

    <form method="POST">
        <label>Nome do funcionário:</label>
        <input type="text" name="nome" required>
        <br><br>

        <label>Valor da hora trabalhada:</label>
        <input type="number" name="valorHora" min="0" step="0.01" required>
        <br><br>

        <label>Quantidade de horas normais:</label>
        <input type="number" name="horasNormais" min="0" step="0.01" required>
        <br><br>

        <label>Quantidade de horas extras:</label>
        <input type="number" name="horasExtras" min="0" step="0.01" required>
        <br><br>

        <button type="submit">Calcular salário</button>
    </form>

    <?= $resultado ?>
</body>
</html>
