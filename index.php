<?php

use App\App;
//use App\Lib\Erro;

error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

error_reporting(E_ALL & ~E_NOTICE);

//header('Content-Type: text/html; charset=iso-8859-1');
require_once("vendor/autoload.php");
try {

   
    $app = new App();
    $app->run();
   
}catch (\Exception $e){

   /* $oError = new Erro($e);
    $oError->render();*/

    echo $e->getMessage();
    new \App\Lib\System\LogError($e->getMessage(),'index - App');

}