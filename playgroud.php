<?php

require "vendor/autoload.php";

use CaiqueBispo\Strategy\CalcularDesconto;
use CaiqueBispo\Strategy\Orcamento;

$orcamento = new Orcamento();
$calcularDesconto = new CalcularDesconto();

$orcamento->value = 100.00;
$orcamento->quantity = 6;

try {

    $desconto = $calcularDesconto->desconto($orcamento);
    echo "Valor total do orçamento: {$orcamento->value}\nValor do desconto: {$desconto}\nTotal a pagar: " . ($orcamento->value - $desconto) . "\n";
    exit();

}catch (\Exception $e) {
    echo "Erro: {$e->getMessage()}\n";
    exit;
}
