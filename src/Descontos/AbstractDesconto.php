<?php

namespace CaiqueBispo\Strategy\Descontos;



use CaiqueBispo\Strategy\Contracts\DescontoInterface;
use CaiqueBispo\Strategy\Orcamento;

abstract class AbstractDesconto
{
    protected ?array $descontos = [];
    protected ?Orcamento $orcamento = null;
    abstract function withData(?Orcamento $orcamento = null): self;
    abstract function setDescontos(?array $descontos = []): self;
    public function next(?Orcamento $orcamento = null,?DescontoInterface $desconto = null): float|null
    {
        if (!is_null($orcamento) && !is_null($desconto)) {

            return $desconto->calcular($orcamento);
        }

        return 0;
    }
}