
<?php

class CompraMateriais {
    public function calcularCusto($quantidade, $precoUnitario) {
        return $quantidade * $precoUnitario;
    }

    public function calcularTotal($cadernos, $canetas, $papel) {
        return $cadernos + $canetas + $papel;
    }

    public function calcularSaldo($orcamento, $total) {
        return $orcamento - $total;
    }

    public function calcularPercentualExcedido($orcamento, $total) {
        if ($total > $orcamento && $orcamento > 0) {
            return (($total - $orcamento) / $orcamento) * 100;
        } else {
            return 0;
        }
    }

    public function verificarOrcamento($saldo) {
        if ($saldo > 0) {
            return "A compra está dentro do orçamento.";
        } elseif ($saldo < 0) {
            return "A compra ultrapassou o orçamento.";
        } else {
            return "A compra utilizou todo o orçamento.";
        }
    }
}
?>
