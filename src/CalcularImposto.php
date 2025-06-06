<?php

namespace CaiqueBispo\Strategy;

use CaiqueBispo\Strategy\Contracts\Imposto;

class CalcularImposto
{
    public function calcular(Orcamento $orcamento, Imposto $imposto): float
    {
        return  $imposto->imposto($orcamento);
    }
}