<?php

namespace CaiqueBispo\Strategy\Descontos;

use CaiqueBispo\Strategy\Orcamento;

class DescontosBase extends AbstractDesconto
{
    function withData(?Orcamento $orcamento = null): DescontosBase
    {
        $this->orcamento = $orcamento;
        return $this;
    }
    function setDescontos(?array $descontos = []): DescontosBase
    {
        $this->descontos = $descontos;
        return $this;
    }
    public function calcular(): float|null|\Exception
    {
        $totalDesconto = 0;

        if(empty($this->descontos)) {
            throw new \Exception('Nenhum desconto foi definido.');
        }

        if(is_null($this->orcamento)) {
            throw new \Exception('Orçamento não foi definido.');
        }

        /** * @var \CaiqueBispo\Strategy\Contracts\DescontoInterface $desconto*/

        foreach ($this->descontos as $key => $desconto)
        {
            $aux_desconto = 0;

           if(is_null($desconto->calcular($this->orcamento))){

               $aux_desconto = $this->next($this->orcamento,$this->descontos[$key + 1] ?? null) ?: 0;
           }

            $aux_desconto = $desconto->calcular($this->orcamento)  ?: 0;

            $totalDesconto+= $aux_desconto;
        }

        return $totalDesconto;
    }
}