<?php

namespace App\Models\DAO;

use \App\Lib\DataBase\DataBase;

class LoginDAO extends DataBase
{
    
    public function logarDAO($usuario,$senha)
    {

        $query = "	select * from clientes 
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
              $chave =   $cookie->criarCookie($r_login[0]['nome']);

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


    public function validarLoginDAO()
    {
        if ((isset($_SESSION['user'])))
        {
            $query = "select * from log_user
                where chave = ? AND ativo = '1' limit 1";

                $values['chave'] = $_SESSION['user'];
                
            if(($r_login_log = $this->query_db($query,$values)) === false)
            {
               
                return false;

            }
           
            $query = "select * from clientes where email = ? and senha = ? and ativo = '1' limit 1";
            $valuesCad['login'] = $r_login_log[0]['email'];
            $valuesCad['senha'] = $r_login_log[0]['senha'];

            if(($r_login = $this->query_db($query,$valuesCad)) === false)
            {
                return false;
            }
                $login['login'] = $r_login[0];

                $_SESSION['codigo_cliente'] = $r_login[0]['id'];

                //var_dump($login);
                return $login;
        }else{

          
            return false;
        }


    }

    public function atualizar($id,$form)
    {
        try{

            $form =  $this->cleanRequest($form);
                
            $tabela['tabela'] = "cadastro_cliente";
            $tabela['v_unico'] = $id;//FORM 
            $tabela['c_unico'] = 'id'; //
            $tabela['t_unico'] = 'numerico';

            $form['senha'] = \md5($form['senha']);

            $form['email'] = $form['usuario'];
            unset($form['usuario']);

           // var_dump($form);

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


}