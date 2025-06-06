<?php

namespace CaiqueBispo\Strategy\Impostos;

use CaiqueBispo\Strategy\Contracts\Imposto;
use CaiqueBispo\Strategy\Orcamento;

class ISS implements Imposto
{
    public function imposto(Orcamento $orcamento): float
    {
        return $orcamento->value * 0.06;
    }
}