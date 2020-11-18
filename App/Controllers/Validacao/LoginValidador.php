<?php

namespace App\Controllers\Validacao;

use \App\Controllers\Validacao\ResultadoValidacao;


class LoginValidador extends ResultadoValidacao{

    public function validarCadastro()
    {

        if(empty($_REQUEST['email']))
        {
            self::addErro("email: Este campo não pode ser vazio");
        }
        else if(\strlen($_REQUEST['email']) < 5)
        {
            self::addErro("email: Este campo não pode ser menor que 5 caracteres");
        }

        if(empty($_REQUEST['senha']))
        {
            self::addErro("Senha: Este campo não pode ser vazio");
        }
        else if(\strlen($_REQUEST['senha']) < 5)
        {
            self::addErro("Senha: Este campo não pode ser menor que 5 caracteres");
        }

    }

    public function validarCadastroUpdate()
    {

      
        if(empty($_REQUEST['email']))
        {
            self::addErro("email: Este campo não pode ser vazio");
        }
        else if(\strlen($_REQUEST['email']) < 5)
        {
            self::addErro("email: Este campo não pode ser menor que 5 caracteres");
        }

        if(empty($_REQUEST['senha']))
        {
            self::addErro("Senha: Este campo não pode ser vazio");
        }
        else if(\strlen($_REQUEST['senha']) < 5)
        {
            self::addErro("Senha: Este campo não pode ser menor que 5 caracteres");
        }

    }
}