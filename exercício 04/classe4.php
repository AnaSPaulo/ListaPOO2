
<?php

class Comissao {
    public function calcularComissao($totalVendido, $percentualComissao) {
        return $totalVendido * $percentualComissao / 100;
    }

    public function calcularBonus($totalVendido) {
        if ($totalVendido > 10000) {
            return 200;
        } else {
            return 0;
        }
    }

    public function calcularSalarioTotal($salarioFixo, $comissao, $bonus) {
        return $salarioFixo + $comissao + $bonus;
    }
}
?>
