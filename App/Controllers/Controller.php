<?php

namespace App\Controllers;

use App\Lib\Sessao;

abstract class Controller
{
    protected $app;
    private $viewVar;
    private $logado;

    public function __construct($app)
    {
        $this->setViewParam('nameController',$app->getControllerName());
        $this->setViewParam('nameAction',$app->getAction());

    }

    public function render($view, $titulo)
    {
        $viewVar   = $this->getViewVar();

        $this->setLogado($this->validarLoginController());

       // $Sessao    = Sessao::class;

        require_once PATH . '/App/Views/__layouts/__head.php';
        require_once PATH . '/App/Views/__layouts/__menu.php';
        require_once PATH . '/App/Views/' . $view . '.php';
        require_once PATH . '/App/Views/__layouts/__footer.php';
        exit;
    }


	

    

    public function redirect($view)
    {
        header('Location:' . APP_HOST_ALL . $view);
        exit;
    }

    public function redirectApi($view)
    {
        header('Location: http://sistemadilainox.pe.hu' . $view);
        exit;
    }

    public function getViewVar()
    {
        return $this->viewVar;
    }

    public function setViewParam($varName, $varValue)
    {
        if ($varName != "" && $varValue != "") {
            $this->viewVar[$varName] = $varValue;
        }
    }

    public function getLogado()
    {
        return $this->logado;
    }

    public function setLogado($var)
    {
        $this->logado = $var;
    }
       


    
    public function renderLogin($view)
    {
        $viewVar   = $this->getViewVar();

    
       // $Sessao    = Sessao::class;

      // echo '/App/Views/' . $view . '.php';

       // require_once PATH . '/App/Views/admin/layouts/__header.php';
        //require_once PATH . '/App/Views/admin/layouts/__nav.php';
        require_once PATH . '/App/Views/' . $view . '.php';
       // require_once PATH . '/App/Views/layouts/footer.php';
    }


    public function renderPublic($view)
    {
        $viewVar   = $this->getViewVar();
    
        require_once PATH . '/App/Views/public/' . $view . '.php';
       
    }


    public function logarController($user,$senha)
    {
        try{

            $login = new \App\Lib\System\Login;

           if(($retorno = $login->logarSystem($user,$senha)) === false)
           {
             self::setViewParam('error',['Senha e/ou login inválido(s)']);
              $this->render('login/index','Login', true);
           }

           $this->render('home/index','index');

        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }


    public function validarLoginController()
    {
        try{

            $login = new \App\Lib\System\Login;

            if(($retorno = $login->validarLoginSystem()) === false)
            {
               return false;
            }
 
           return true;

        }catch(Exceptin $e)
        {
            echo $e->getMessage();
        }

    }

    public function validarLoginControllerIndex()
    {
        try{

            $login = new \App\Lib\System\Login;

            if(($retorno = $login->validarLoginSystem()) === false)
            {
                return false;
            }

 
           return true;


        }catch(Exceptin $e)
        {
            echo $e->getMessage();
        }

    }


    public function trataURL()
    {
        if(isset($_REQUEST['url']))
        {
           $array =  explode("/",$_REQUEST['url']);
           return $array[1];
        }
        
    }


    public function somaCarrinho()
    {
        if(isset($_SESSION['codigo_cliente']))
        {
            
            $produtos = new \App\Models\DAO\ProdutoDAO();

            if(($dados= $produtos->somaCarrinho()) !==false)
            {

                $soma = $dados['soma'][0]['valor'];

               return $soma;
                
            }

        }
        return "0";
    }

    public function somaQuantidade()
    {
        if(isset($_SESSION['codigo_cliente']))
        {
            
            $produtos = new \App\Models\DAO\ProdutoDAO();

            if(($dados= $produtos->somaQuantidade()) !==false)
            {

                //var_dump($dados);

                $soma = $dados['quantidade'][0]['quantidades'];

               return $soma;
                
            }

        }
        return "0";
    }



}