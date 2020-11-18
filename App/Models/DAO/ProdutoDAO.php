<?php

namespace App\Models\DAO;

use \App\Lib\DataBase\DataBase;

class ProdutoDAO extends DataBase
{

    /**
     * Lista de filmes para mostrar em programação
     */

    public function listar($filtros = false)
    {

        try{

            $ativo=false;

            $query ="select * from produtos";

            if($filtros === false)
            {
                $values = false;

            }else{

                $query .=" where clientes_id = ?";

                $values['id'] =  $filtros['id_cliente'];
                $ativo=true;

            }
            
            if($values === false){

                $query .=" where ativo = '1'";
            }


            if($ativo ===true)
            {
                $query .= " and  ativo = '1'";
            }

         /*   echo $query;
            var_dump($values);
            var_dump($filtros);*/
    

            if(($r_produtos = $this->query_db($query,$values)) !== false)
            {
                $dados['produtos'] =  $r_produtos;

                return $dados;
            }

           return false;

    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
        
    }

    public function findById($id)
    {

        try{

            $query ="select * from produtos where id =? ";

            $values['id'] = $id;
          
            if(($r_produtos = $this->query_db($query,$values)) !== false)
            {
                $dados['produto'] =  $r_produtos;

                return $dados;
            }

           return false;

    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
        
    }

    public function atualizar($id,$form)
    {
        try{

          $form = $this->converterTextoUtf_decode($form);

           $form =  $this->cleanRequest($form);

                
            $tabela['tabela'] = "produtos";
            $tabela['v_unico'] = $id;//FORM 
            $tabela['c_unico'] = 'id'; //
            $tabela['t_unico'] = 'numerico';

            $retorno	= $this->update_db($tabela,$form);

          //  var_dump($retorno);

            if(is_numeric($retorno))
            {
                return true;
            }

            return false;

        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }


    public function somaCarrinho()
    {

        try{

            $query ="SELECT SUM(valor) as valor FROM carrinhos WHERE cliente_id= ? and ativo = '1' and data_pagamento is null";

            $values['id'] = $_SESSION['codigo_cliente'];
          
            if(($r = $this->query_db($query,$values)) !== false)
            {
                $dados['soma'] =  $r;

                return $dados;
            }

           return false;

    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
        
    }
    
    

    public function somaQuantidade()
    {

        try{

            $query ="SELECT count(*) as quantidades FROM carrinhos WHERE cliente_id= ? and ativo = '1' and data_pagamento is null";

            $values['id'] = $_SESSION['codigo_cliente'];
          
            if(($r = $this->query_db($query,$values)) !== false)
            {
                $dados['quantidade'] =  $r;

                return $dados;
            }

           return false;

    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
        
    }

    public function findByIdCarrinho($id)
    {

        try{

            $query ="select carrinhos.id as id, 
            carrinhos.cliente_id as cliente_id,
            carrinhos.data_pagamento as data_pagamento,
            carrinhos.quantidade as quantidade,
            carrinhos.produto_id as produto_id, 
            carrinhos.nome as nome,
            carrinhos.valor, carrinhos.adicionado, produtos.caminho_img from carrinhos
            join produtos on produtos.id = carrinhos.produto_id 
            WHERE cliente_id= ? and produtos.ativo = '1' and carrinhos.ativo='1' and data_pagamento is null";

            $values['id'] = $id;
          
            if(($r_produtos = $this->query_db($query,$values)) !== false)
            {
                $dados['carrinhos'] =  $r_produtos;

                return $dados;
            }

           return false;

    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
        
    }


    public function atualizarCarrinho($id,$form)
    {
        try{

          $form = $this->converterTextoUtf_decode($form);

           $form =  $this->cleanRequest($form);

                
            $tabela['tabela'] = "carrinhos";
            $tabela['v_unico'] = $id;//FORM 
            $tabela['c_unico'] = 'id'; //
            $tabela['t_unico'] = 'numerico';


          //  var_dump($form);

            $retorno	= $this->update_db($tabela,$form);

          //  var_dump($retorno);

            if(is_numeric($retorno))
            {
                return true;
            }

            return false;

        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

}