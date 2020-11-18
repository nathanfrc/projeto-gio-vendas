<?php

namespace App\Controllers\Validacao;

use \App\Controllers\Validacao\ResultadoValidacao;


class ProdutoValidador extends ResultadoValidacao{

    public function validarCadastro()
    {


        if(empty($_REQUEST['nome']))
        {
            self::addErro("nome: Este campo não pode ser vazio");
        }
        
        if(\strlen($_REQUEST['nome']) > 250)
        {
            self::addErro("nome: Este campo não pode ter mais que 250 caracteres");
        }

        
        if(empty($_REQUEST['descricao']))
        {
            self::addErro("descricao: Este campo não pode ser vazio");
        }
        
        if(\strlen($_REQUEST['descricao']) > 250)
        {
            self::addErro("descricao: Este campo não pode ter mais que 250 caracteres");
        }

        if(empty($_REQUEST['caminho_img']))
        {
            self::addErro("IMG Principal: Este campo não pode ser vazio");
        }

    }
}