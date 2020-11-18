<?php

namespace App\Controllers;
//use AppModelsMiddleMercadoBitcoins;
//use AppModelsDAOPesquisaDAO;
//use AppModelsDAOVoitoDAO;

class LoginController extends Controller
{
	
    public function index()
    {
      if($_SERVER['REQUEST_METHOD'] == 'GET')
      {  

         self::setViewParam('login',true);
         $this->render('login/index','Login');

        exit;
      }else{

        $this->render('error/401','Login');
      }

    }


    public function create()
    {
      try{

        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {

          self::setViewParam('login',true);
          $this->render('login/create','Cadastro');

        }else if($_SERVER['REQUEST_METHOD'] == 'POST'){

        
         $validarDados = new \App\Controllers\Validacao\ClienteValidador();
         $validarDados->validarCadastro();

          if($validarDados->getErros())
          {
              self::setViewParam('error',$validarDados->getErros());
              self::setViewParam('cliente',$_REQUEST);
              $this->render('login/create','Cadastro de clientes', false,true);
          }

          $clienteDAO = new \App\Models\DAO\ClienteDAO();


       if(($retorno = $clienteDAO->adiciona($_REQUEST)) ===true)
       {
         self::setViewParam("sucesso","Cadastrado com sucesso");
         $this->render('login/index','Login', false,true);
       }else{

          $validarDados->addErro("erro: ao cadastar");
          self::setViewParam('error',$validarDados->getErros());
          self::setViewParam('cliente',$_REQUEST);
          $this->render('login/create','Cadastro de clientes', false,true);
       }

       

        }else{

            $this->render('error/401','Login');
        }

      }catch(Exeception $e)
      {
        echo $e->getMessage();
      }
    }

    public function logout()
    {
        $cookie =  new  \App\Lib\System\Cookie;
        $cookie->logout();
        $this->render('login/index','Login',false,true);
    }


    public function logar()
    {
        try{

            if($_SERVER['REQUEST_METHOD'] == 'POST')
            { 

                $validarDados = new \App\Controllers\Validacao\LoginValidador();
                $validarDados->validarCadastro();
    
                if($validarDados->getErros())
                {
                   self::setViewParam('error',$validarDados->getErros());
                   self::setViewParam('login',$_REQUEST);
                   $this->index();
                }


                $this->logarController(trim($_REQUEST['email']), trim($_REQUEST['senha']));


            }else if ($_SERVER['REQUEST_METHOD'] == 'GET'){

                $this->index();

            }else{

                self::setViewParam('error',['Erro ao fazer Login']);
                $this->index();

            }

        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }




}