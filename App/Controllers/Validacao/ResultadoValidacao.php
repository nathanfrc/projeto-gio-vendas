<?php

namespace App\Controllers\Validacao;

class ResultadoValidacao{

    private $erros = [];
    
    public function addErro($mensagem){
        $this->erros[] = $mensagem;
    }

    public function getErros()
    {
        return $this->erros;
    }

}