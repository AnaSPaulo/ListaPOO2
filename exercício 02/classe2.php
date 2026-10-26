
<?php

class FolhaPagamento {
    public function calcularSalarioNormal($valorHora, $horasNormais) {
        return $valorHora * $horasNormais;
    }

    public function calcularHorasExtras($valorHora, $horasExtras) {
        return ($valorHora * 1.5) * $horasExtras;
    }

    public function calcularSalarioBruto($salarioNormal, $valorHorasExtras) {
        return $salarioNormal + $valorHorasExtras;
    }

    public function verificarHorasExtras($horasExtras) {
        if ($horasExtras > 10) {
            return "Atenção: volume elevado de horas extras!";
        } else {
            return "Quantidade de horas extras dentro do limite de atenção.";
        }
    }
}
?>
