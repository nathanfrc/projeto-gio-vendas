<?php

namespace App\Controllers\Validacao;

use \App\Controllers\Validacao\ResultadoValidacao;


class ClienteValidador extends ResultadoValidacao{

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

        if(empty($_REQUEST['senha']))
        {
            self::addErro("senha: Este campo não pode ser vazio");
        }
        
        if(\strlen($_REQUEST['senha']) > 250)
        {
            self::addErro("senha: Este campo não pode ter mais que 250 caracteres");
        }

        if(empty($_REQUEST['email']))
        {
            self::addErro("email: Este campo não pode ser vazio");

        }else{

              $clienteDAO = new \App\Models\DAO\ClienteDAO();

              $filtro['email'] = $_REQUEST['email'];

            if(($dadosGeneros= $clienteDAO->verificaEmail($filtro)) !== false)
            {
                self::addErro("email: Já existe na base de dados");

            }
        }
        

    }
}