<?php

namespace App\Controllers;

class ProdutoController extends Controller
{


    public function index()
    {

        $this->render('produto/index','Home');

        exit;

    }


    public function detalhes($id)
    {
      $produtos = new \App\Models\DAO\ProdutoDAO();
      if(($dados= $produtos->findById($id[0])) !==false)
      {
          self::setViewParam('produtos',$dados);
          $this->render('produto/detalhes','detalhes');
          exit;
      }
   
      self::setViewParam('error',['erro na busca']);

      $this->myProdutos();


    }



    public function myProdutos()
    {

      
      $produtos = new \App\Models\DAO\ProdutoDAO();

      if(!$_SESSION['codigo_cliente'])
      {
            self::setViewParam('error',['erro na sessão do usuario']);
            self::setViewParam('produto',$_REQUEST);
            $this->render('produto/create','Cadastro de Produtos', false,true);
       }

         $filtro['id_cliente'] = $_SESSION['codigo_cliente'];

         //var_dump($filtro);

      if(($dados= $produtos->listar($filtro)) !==false)
      {
          self::setViewParam('listaProdutos',$dados);
      }
    
      self::setViewParam('menu',false);
      $this->render('produto/myProdutos','Home');
      exit;
    }


    public function create()
    {
      try{

        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
          self::setViewParam('menu',false);
          self::setViewParam('login',true);
          $this->render('produto/create','Cadastro de Produtos');

        }else if($_SERVER['REQUEST_METHOD'] == 'POST'){

          if(!$_SESSION['codigo_cliente'])
          {
            self::setViewParam('error',['erro na sessão do usuario']);
            self::setViewParam('produto',$_REQUEST);
            $this->render('produto/create','Cadastro de Produtos', false,true);
          }

          $_REQUEST['clientes_id'] = $_SESSION['codigo_cliente'];


         $validarDados = new \App\Controllers\Validacao\ProdutoValidador();
         $validarDados->validarCadastro();

          if($validarDados->getErros())
          {
              self::setViewParam('error',$validarDados->getErros());
              self::setViewParam('produto',$_REQUEST);
              $this->render('produto/create','Cadastro de Produtos', false,true);
          }

      

     
        $generic = new \App\Models\DAO\GenericDAO();

       if(($retDao =$generic->create('produtos',$_REQUEST)) !== false)
       {
          self::setViewParam('sucesso','Produto Cadastrado com sucesso !!!');
          $this->render('produto/create','Cadastro de Produtos', false,true);
      
       }else{

          self::setViewParam('error',['Erro ao cadastrar Filmes!! tente novamente']);

          $this->render('produto/create','Cadastro de Produtos', false,true);
       }


        }else{

            $this->render('error/401','Login');
        }

      }catch(Exeception $e)
      {
        echo $e->getMessage();
      }
    }


    public function update($id)
    {
      try{

       
          if(!$_SESSION['codigo_cliente'])
          {
            self::setViewParam('error',['erro na sessão do usuario']);
            self::setViewParam('produto',$_REQUEST);
            $this->render('produto/create','Cadastro de Produtos', false,true);
          }

          $_REQUEST['clientes_id'] = $_SESSION['codigo_cliente'];

          $produtos = new \App\Models\DAO\ProdutoDAO();
          if(($dados= $produtos->findById($id[0])) === false)
          {
              self::setViewParam('produtos',$dados);
              $this->myProdutos();
              exit;
          }




          if(($ret =$produtos->atualizar($id[0],$_REQUEST)) === true)
          {
            self::setViewParam('sucesso','Produto Alterado com sucesso !!!');
            $this->myProdutos();
          }

          self::setViewParam('error',$validarDados->getErros());
          self::setViewParam('produto',$_REQUEST);
          $this->render('produto/detalhes','Cadastro de Produtos', false,true);
  

      }catch(Exeception $e)
      {
        echo $e->getMessage();
      }
    }


    public function detalhesCompra($id)
    {

      $produtos = new \App\Models\DAO\ProdutoDAO();
      if(($dados= $produtos->findById($id[0])) !== false)
      {
          self::setViewParam('produtos',$dados);

          $filtro['id_cliente']  =  (int) $dados['produto'][0]['clientes_id'];

          if(($dadosOpcao = $produtos->listar($filtro)) !== false)
          {
            self::setViewParam('opcoes',$dadosOpcao);
          }


          $cliente = new \App\Models\DAO\ClienteDAO();
          $clientesDados = $cliente->findByCliente($filtro['id_cliente']);

          self::setViewParam('cliente',$clientesDados);


          $this->render('produto/detalhesCompra','Detalhes Compra');
          exit;
      }

     $this->redirect("home/index");

    }


    public function addCarrinho($id)
    {

      
      $produtos = new \App\Models\DAO\ProdutoDAO();
      if(($dados= $produtos->findById($id[0])) !==false)
      {

        if(isset($_REQUEST['quantity']) && !empty($_REQUEST['quantity']))
        {
          $form['quantidade'] = $_REQUEST['quantity'];
        }
  
  
          $form['descricao'] = $dados['produto'][0]['descricao'];
          $form['cliente_id'] = $_SESSION['codigo_cliente'];
          $form['produto_id'] = (int) $dados['produto'][0]['id'];
          $form['nome'] =$dados['produto'][0]['nome'];
          $form['valor'] =$dados['produto'][0]['valor'];


          $generic = new \App\Models\DAO\GenericDAO();

          if(($retDao =$generic->create('carrinhos',$form)) !== false)
          {
      
      
             self::setViewParam('sucesso','Produto adicionado no carrinho sucesso !!!');
            
          }

          $this->redirect("home/index");

      }

    }


    public function teste()
    {

      $produtos = new \App\Models\DAO\ProdutoDAO();
      if(($dados= $produtos->findByIdCarrinho($_SESSION['codigo_cliente'])) !==false)
      {


      }

      $this->render('produto/carrinho','Detalhes Compra');
      exit;
    }


    public function carrinho()
    {

      $produtos = new \App\Models\DAO\ProdutoDAO();
      if(($dados= $produtos->findByIdCarrinho($_SESSION['codigo_cliente'])) !==false)
      {
          self::setViewParam('carrinhos',$dados);


      }

      $this->render('produto/carrinho','Detalhes Compra');
      exit;
    }



    public function tirarCarrinho($id)
    {

      if(!isset($_REQUEST['produto']))
      {
        $this->carrinho();
      }


        $produtos = new \App\Models\DAO\ProdutoDAO();
        if(($dados= $produtos->findById($_REQUEST['produto'])) ===false)
        {
          $this->carrinho();
          exit;
        }

        $form['ativo'] = '0';

        if(($ret =$produtos->atualizarCarrinho($id[0],$form)) === true)
        {
            self::setViewParam('sucesso','Produto Alterado com sucesso !!!');
           
        }

        $this->carrinho();
     
    }

    public function compra()
    {
      $this->render('produto/compra','checkout Compra');
      exit;
    }

    public function finalizar()
    {
      $produtos = new \App\Models\DAO\ProdutoDAO();
      if(($dados= $produtos->findByIdCarrinho($_SESSION['codigo_cliente'])) !==false)
      {

          $form['data_pagamento'] = date("Y-m-d h:i:s");
              
          for ($i=0; $i <sizeof($dados['carrinhos']) ; $i++)
          {

            $produtos->atualizarCarrinho($dados['carrinhos'][$i]['id'],$form);
          
          }

      }


      self::setViewParam('carrinho',self::somaCarrinho());

      $produtos = new \App\Models\DAO\ProdutoDAO();

  
      if(($dados= $produtos->listar()) !==false)
      {
          self::setViewParam('listaProdutos',$dados);
      }

      self::setViewParam('sucesso','Compra finalizada!!!');
        
        $this->render('home/index','Home');

      exit;


    }

}