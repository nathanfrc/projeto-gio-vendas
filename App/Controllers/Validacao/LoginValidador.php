<?php

namespace App\Controllers\Validacao;

use \App\Controllers\Validacao\ResultadoValidacao;


class LoginValidador extends ResultadoValidacao{

    public function validarCadastro()
    {

        if(empty($_REQUEST['email']))
        {
            self::addErro("email: Este campo n�o pode ser vazio");
        }
        else if(\strlen($_REQUEST['email']) < 5)
        {
            self::addErro("email: Este campo n�o pode ser menor que 5 caracteres");
        }

        if(empty($_REQUEST['senha']))
        {
            self::addErro("Senha: Este campo n�o pode ser vazio");
        }
        else if(\strlen($_REQUEST['senha']) < 5)
        {
            self::addErro("Senha: Este campo n�o pode ser menor que 5 caracteres");
        }

    }

    public function validarCadastroUpdate()
    {

      
        if(empty($_REQUEST['email']))
        {
            self::addErro("email: Este campo n�o pode ser vazio");
        }
        else if(\strlen($_REQUEST['email']) < 5)
        {
            self::addErro("email: Este campo n�o pode ser menor que 5 caracteres");
        }

        if(empty($_REQUEST['senha']))
        {
            self::addErro("Senha: Este campo n�o pode ser vazio");
        }
        else if(\strlen($_REQUEST['senha']) < 5)
        {
            self::addErro("Senha: Este campo n�o pode ser menor que 5 caracteres");
        }

    }
}