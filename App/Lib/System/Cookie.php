<?php

namespace App\Lib\System;

class Cookie
{

    public function __construct() {}


    public function criarCookie($nome)
    {
        try{

            $func =  new \App\Lib\System\FunctionsFramework;
            $chave = $func->randomkeys(64);

            setcookie ("user",$chave,time()+36000,"/",COOKIE_PATH, TRUE, TRUE);

            $_SESSION['user'] = $chave;
            $_SESSION['nome'] = $nome;

            return $chave;

        }catch(Exception $e)
        {
            echo $e->getMessage();

        }
    }

    public function logout()
    {
        try{

            setcookie ('user','',time()+36000,"/",COOKIE_PATH, TRUE, TRUE);
            unset($_SESSION['user']);
            unset($_SESSION['nome']);
            unset($_SESSION['codigo_cliente']);
            
        }catch(Exception $e)
        {
            echo $e->getMessage();

        }
    }




}