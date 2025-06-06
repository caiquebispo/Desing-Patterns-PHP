<?php

require "vendor/autoload.php";

use CaiqueBispo\Strategy\CalcularImposto;
use CaiqueBispo\Strategy\Impostos\{ICMS, ISS};
use CaiqueBispo\Strategy\Orcamento;

$orcamento = new Orcamento();
$orcamento->value = 1500.00;

$calcularImposto = new CalcularImposto();
$impostICMS = $calcularImposto->calcular($orcamento, new ICMS());
$impostISS = $calcularImposto->calcular($orcamento, new ISS());

echo "O valor do imposto ICMS é: {$impostICMS}\nO valor do imposto ISS é: {$impostISS} \n";