<?php

class Route
{
  //cria vetor de rotas validas, vazio
  public static $validRoutes = array();

//função define a rota e sua função, que estão no Arquivo Routes
  public static function set($route, $function)
  {
    //adiciona nome da uri as rotas validas
    self::$validRoutes[] = $route;
    //print_r(self::$validRoutes);


    //link em branco manda direto para login
    if (isset($_GET['url'])) {
        //nome passado para o servidor == a rota
      if ($_GET['url'] == $route ) {
      //autoexecuta as funçoes da classe destino indicada pela uri
      $function->__invoke();
      }


    }else {
      header("Location: login");

    }

  }
}


 ?>
