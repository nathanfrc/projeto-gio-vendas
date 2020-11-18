<?php

namespace App\Controllers;
//use AppModelsMiddleMercadoBitcoins;
//use AppModelsDAOPesquisaDAO;
//use AppModelsDAOVoitoDAO;

class HomeController extends Controller
{
	
    public function index()
    {
      self::setViewParam('carrinho',self::somaCarrinho());

      $produtos = new \App\Models\DAO\ProdutoDAO();

  
      if(($dados= $produtos->listar()) !==false)
      {
          self::setViewParam('listaProdutos',$dados);
      }
        
        $this->render('home/index','Home');

      exit;

    }




}