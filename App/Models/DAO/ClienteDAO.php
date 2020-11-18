<?php

namespace App\Models\DAO;

use \App\Lib\DataBase\DataBase;

class ClienteDAO extends DataBase
{
    
    public function logarDAO($usuario,$senha)
    {

        $query = "	select * from cadastro_cliente 
        where email = ? and senha = md5( ? ) and ativo = '1'";

        $values['email'] = $usuario;
        $values['senha'] = $senha;

        if(($r_login = $this->query_db($query,$values)) === false)
        {
            //echo "login não cadastrado";
            return false;

        }else{

           // echo "sucesso";

              $cookie =  new  \App\Lib\System\Cookie;
              $chave =   $cookie->criarCookie();

              $table['tabela'] = "log_user";

              $form['tipo_cadastro'] = 'ADMIN';
              $form['chave'] = $chave;
              $form['email'] = $r_login[0]['email'];
              $form['senha'] = $r_login[0]['senha'];
              $form['ip'] = $_SERVER['REMOTE_ADDR'];
              $retorno = $this->add_db_pdo($table,$form);
      
              if(isset($retorno[0]['id']))
              {
                  return true;
              }

              return false;

        }
    }

    public function verificaEmail($filtro = array())
    {
        try{

            
        $query = "	select * from clientes 
        where email = ?";

        $values['email'] = $filtro['email'];

        if(($r_login = $this->query_db($query,$values)) !== false)
        {
            //echo "login não cadastrado";
            return true;

        }


        return false;

        }catch(Exception $e)
        {
                echo $e->getMessage();
        }
    }


    public function adiciona($forms)
    {
        try{

            $table['tabela'] = "clientes";

            $forms['senha'] =  \md5($forms['senha']);

            
            $retorno =     $this->add_db_pdo($table,$this->cleanRequest($forms));

            if(isset($retorno[0]['id']))
            {
                return true;
            }

            return false;

        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }


    public function findByCliente($id)
    {

        $query="select * from clientes where id = ?";
        $values['id'] = $id;

        if(($r_login = $this->query_db($query,$values)) !== false)
        {
           $cliente = $r_login[0];

           return $cliente;
        }

        return false;
    }
    


}