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
        if(empty($this->descontos)) {
            throw new \Exception('Nenhum desconto foi definido.');
        }

        if(is_null($this->orcamento)) {
            throw new \Exception('Orçamento não foi definido.');
        }

        /** * @var \CaiqueBispo\Strategy\Contracts\DescontoInterface $desconto*/

        foreach ($this->descontos as $key => $desconto)
        {

           if(is_null($desconto->calcular($this->orcamento))){

               return $this->next($this->orcamento,$this->descontos[$key + 1]);
           }

           return $desconto->calcular($this->orcamento);
        }

        return 0;
    }
}