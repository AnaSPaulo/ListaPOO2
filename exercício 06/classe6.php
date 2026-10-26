
<?php

class Entrega {
    public function calcularCustoDistancia($distancia, $valorKm) {
        return $distancia * $valorKm;
    }

    public function calcularTaxaPeso($peso, $taxaKg) {
        return $peso * $taxaKg;
    }

    public function calcularFrete($custoDistancia, $taxaPeso) {
        return $custoDistancia + $taxaPeso;
    }

    public function calcularDesconto($valorProdutos, $frete) {
        if ($valorProdutos > 500) {
            return $frete * 0.5;
        } else {
            return 0;
        }
    }

    public function calcularFreteFinal($frete, $desconto) {
        return $frete - $desconto;
    }

    public function calcularTotalCompra($valorProdutos, $freteFinal) {
        return $valorProdutos + $freteFinal;
    }
}
?>
