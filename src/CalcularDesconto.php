<?php

namespace CaiqueBispo\Strategy;

use CaiqueBispo\Strategy\Descontos\{DescontoAcimaDe100Reias,DescontoAcimaDe5Itens,DescontosBase};
class CalcularDesconto
{
    /**
     * @throws \Exception
     */
    public function desconto(Orcamento $orcamento): float|null|\Exception
    {
        return new DescontosBase()
                    ->withData($orcamento)
                    ->setDescontos([
                        new DescontoAcimaDe5Itens(),
                        new DescontoAcimaDe100Reias(),
                    ])
                    ->calcular();

    }
}