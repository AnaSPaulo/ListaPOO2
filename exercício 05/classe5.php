
<?php

class Orcamento {
    public function calcularMaoDeObra($quantidadeHoras, $valorHora) {
        return $quantidadeHoras * $valorHora;
    }

    public function calcularSubtotal($valorPecas, $maoDeObra) {
        return $valorPecas + $maoDeObra;
    }

    public function calcularDesconto($subtotal, $percentualDesconto) {
        return $subtotal * $percentualDesconto / 100;
    }

    public function calcularTotal($subtotal, $desconto) {
        return $subtotal - $desconto;
    }

    public function verificarAprovacao($total) {
        if ($total > 1000) {
            return "Atenção: será necessária a aprovação do cliente.";
        } else {
            return "Não é necessária aprovação especial do cliente.";
        }
    }
}
?>
