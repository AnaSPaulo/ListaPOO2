
<?php

class Caixa {
    public function calcularValorBruto($quantidade, $precoUnitario) {
        return $quantidade * $precoUnitario;
    }

    public function calcularDesconto($valorBruto, $percentualDesconto) {
        return $valorBruto * $percentualDesconto / 100;
    }

    public function calcularTotal($valorBruto, $desconto) {
        return $valorBruto - $desconto;
    }

    public function calcularPagamento($valorPago, $totalPagar) {
        if ($valorPago >= $totalPagar) {
            return "Troco: R$ " . number_format($valorPago - $totalPagar, 2, ',', '.');
        } else {
            return "Valor restante: R$ " . number_format($totalPagar - $valorPago, 2, ',', '.');
        }
    }
}
?>
