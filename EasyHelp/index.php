<?php
//retorna o index|echo $_GET['url']|
require_once('Routes.php');

//auto carrega as funções da classe
function __autoload($className){

//REDIRECIONA PARA OS ARQUIVOS
//NÃO É EXIBIDO A EXTENSÃO DOS ARQUIVOS NO LINK DO NAVEGADOR == + SEGURANÇA

  if (file_exists('./classes/'.$className.'.php')) {
    require_once ('./classes/'.$className.'.php');
    spl_autoload($className);

  }elseif (file_exists('./Controllers/'.$className.'.php')) {
    require_once ('./Controllers/'.$className.'.php');
    spl_autoload($className);

  }elseif (file_exists('./lib/'.$className.'.php')) {
    require_once ('./lib/'.$className.'.php');
    spl_autoload($className);

  }elseif (file_exists('./public/'.$className.'')) {
    require_once ('./public/'.$className.'');
    spl_autoload($className);
  }

}


 ?>
