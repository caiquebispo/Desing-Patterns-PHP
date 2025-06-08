<?php

namespace CaiqueBispo\Strategy\Descontos;

use CaiqueBispo\Strategy\Contracts\DescontoInterface;
use CaiqueBispo\Strategy\Orcamento;

class DescontoAcimaDe5Itens implements DescontoInterface
{
    public function calcular(Orcamento $orcamento): float|null
    {
        if ($orcamento->quantity > 5) {
            return $orcamento->value * 0.1;
        }
        return null;
    }
}