<?php

namespace CaiqueBispo\Strategy\Descontos;

use CaiqueBispo\Strategy\Contracts\DescontoInterface;
use CaiqueBispo\Strategy\Orcamento;

class DescontoAcimaDe100Reias implements DescontoInterface
{

    function calcular(?Orcamento $orcamento = null): float|null
    {
        if(!is_null($orcamento) && $orcamento->value >= 100) {
            return $orcamento->value * 0.05;
        }
       return null;
    }

}