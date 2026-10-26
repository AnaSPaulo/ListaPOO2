
<?php

class ControleFinanceiro {
    public function calcularDespesas($aluguel, $funcionarios, $energiaInternet, $outrasDespesas) {
        return $aluguel + $funcionarios + $energiaInternet + $outrasDespesas;
    }

    public function calcularResultado($receita, $despesas) {
        return $receita - $despesas;
    }

    public function verificarSituacao($resultado) {
        if ($resultado > 0) {
            return "A empresa teve lucro.";
        } elseif ($resultado < 0) {
            return "A empresa teve prejuízo.";
        } else {
            return "A empresa não teve lucro nem prejuízo.";
        }
    }

    public function calcularMargemLucro($receita, $resultado) {
        if ($receita > 0) {
            return ($resultado / $receita) * 100;
        } else {
            return 0;
        }
    }
}
?>
