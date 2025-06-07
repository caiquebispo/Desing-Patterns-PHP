<?php

namespace CaiqueBispo\Strategy\Contracts;

use CaiqueBispo\Strategy\Orcamento;

interface DescontoInterface
{
    public function calcular(Orcamento $orcamento): float|null;
}