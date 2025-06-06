<?php

namespace CaiqueBispo\Strategy\Contracts;

use CaiqueBispo\Strategy\Orcamento;

interface Imposto
{
    public function imposto(Orcamento $orcamento);
}