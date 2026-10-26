
<?php

class Estoque {
    public function calcularValorEstoque($quantidade, $precoCusto) {
        return $quantidade * $precoCusto;
    }

    public function verificarEstoque($quantidade, $estoqueMinimo) {
        if ($quantidade < $estoqueMinimo) {
            return "Estoque baixo! É necessário comprar produtos.";
        } else {
            return "Estoque suficiente.";
        }
    }

    public function calcularReposicao($quantidade, $estoqueMinimo) {
        if ($quantidade < $estoqueMinimo) {
            return $estoqueMinimo - $quantidade;
        } else {
            return 0;
        }
    }

    public function calcularCustoCompra($quantidadeCompra, $precoCusto) {
        return $quantidadeCompra * $precoCusto;
    }
}
?>
