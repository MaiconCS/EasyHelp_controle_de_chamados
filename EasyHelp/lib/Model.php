<?php
//mesmo que model?!?!?!?!
class Model {

  public static $host = "127.0.0.1";//ou localhost, verificar porta do banco
  public static $dbName = "db_one";//NomeDoBanco
  public static $userName = "root";
  public static $password = "";

  //segurança do banco;
  private static function connect() {
    try {
      $pdo= new PDO("mysql:host=".self::$host."; dbname=".self::$dbName."; charset=utf8", self::$userName, self::$password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;

    }catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public static function querySelect($query, $params = array()){
    $statement = self::connect()->prepare($query);
    $statement->execute($params);

    if (explode(' ', $query)[0] == 'SELECT') {
      $data = $statement->fetchALL();
      return $data;
    }
  }

  public static function queryInsert($query, $params = array()){
    $statement = self::connect()->prepare($query);
    $statement->execute($params);

    if (explode(' ', $query)[0] == 'INSERT') {
      return'Success';

    }else {

      return'ERRO : '.$query. ' '.self::connect()->errorCode().'';

    }
  }

  public static function queryUpdate($query, $params = array()){
    $statement = self::connect()->prepare($query);
    $statement->execute($params);

    if (explode(' ', $query)[0] == 'UPDATE' ||
        explode(' ', $query)[0] == 'SET'){
      return'Success';

    }else {

      return'ERRO : '.$query. ' '.self::connect()->errorCode().'';

    }
  }

  public static function queryDelete($query, $params = array()){
    $statement = self::connect()->prepare($query);
    $statement->execute($params);

    if (explode(' ', $query)[0] == 'DELETE') {
      return'Success';

    }else {

      return'ERRO : '.$query. ' '.self::connect()->errorCode().'';

    }
  }


  public static function queryCountReg($query, $params = array()){
    //executa count com a função da própria class usando self
    $count_reg = self::connect()->prepare($query);
    $count_reg->execute($params);//executa count
    //verifica consulta passada antes de ser executada
    //caso o primeiro elemento da query sql seja SELECT, sera executado o if
    if (explode(' ', $query)[0] == 'SELECT') {
      $rows = $count_reg->fetchALL(); //associa a rows os registros da tabela
      $total_reg = count($rows); //conta os valores da var rows
      return $total_reg;
    }
  }

  public static function queryVerifyAccess($query, $params = array()){
    $level_access=0;//evita    Notice: Undefined variable
    //executa count com a função da própria class usando self
    $verify_access = self::connect()->prepare($query);
    $verify_access->execute($params);//executa count

    if (explode(' ', $query)[0] == 'SELECT') {
      $rows = $verify_access->fetchALL(PDO::FETCH_OBJ); //associa a rows aos objetos da tabela
      //faz uma varredura para encontrar o objeto
      foreach ($rows as $list) {
        //associa o valor do obj(coluna da tabela) a var level acesso
         $level_access=$list->fk_id_acesso;

      }

        return $level_access;
    }
  }

  public static function queryVerifyUserId($query, $params = array()){
    $level_access=0;//evita    Notice: Undefined variable
    //executa count com a função da própria class usando self
    $verify_access = self::connect()->prepare($query);
    $verify_access->execute($params);//executa count

    if (explode(' ', $query)[0] == 'SELECT') {
      $rows = $verify_access->fetchALL(PDO::FETCH_OBJ); //associa a rows aos objetos da tabela
      //faz uma varredura para encontrar o objeto
      foreach ($rows as $list) {
        //associa o valor do obj(coluna da tabela) a var level acesso
         $id_access=$list->pk_id_usuario;

      }

        return $id_access;
    }
  }

  public static function queryVerifyCallId($query, $params = array()){
    $level_access=0;//evita    Notice: Undefined variable
    //executa count com a função da própria class usando self
    $verify_access = self::connect()->prepare($query);
    $verify_access->execute($params);//executa count

    if (explode(' ', $query)[0] == 'SELECT') {
      $rows = $verify_access->fetchALL(PDO::FETCH_OBJ); //associa a rows aos objetos da tabela
      //faz uma varredura para encontrar o objeto
      foreach ($rows as $list) {
        //associa o valor do obj(coluna da tabela) a var level acesso
         $id_call=$list->pk_id_chamado;

      }

        return $id_call;
    }
  }
  public static function queryVerifyUserPsw($query, $params = array()){
    $level_access=0;//evita    Notice: Undefined variable
    //executa count com a função da própria class usando self
    $verify_access = self::connect()->prepare($query);
    $verify_access->execute($params);//executa count

    if (explode(' ', $query)[0] == 'SELECT') {
      $rows = $verify_access->fetchALL(PDO::FETCH_OBJ); //associa a rows aos objetos da tabela
      //faz uma varredura para encontrar o objeto
      foreach ($rows as $list) {
        //associa o valor do obj(coluna da tabela) a var level acesso
         $usr_psw=$list->senha;

      }

        return $usr_psw;
    }
  }
  public static function queryVerifyEquipmentId($query, $params = array()){
    $level_access=0;//evita    Notice: Undefined variable
    //executa count com a função da própria class usando self
    $verify_access = self::connect()->prepare($query);
    $verify_access->execute($params);//executa count

    if (explode(' ', $query)[0] == 'SELECT') {
      $rows = $verify_access->fetchALL(PDO::FETCH_OBJ); //associa a rows aos objetos da tabela
      //faz uma varredura para encontrar o objeto
      foreach ($rows as $list) {
        //associa o valor do obj(coluna da tabela) a var level acesso
         $id_equipamento=$list->pk_id_equipamento;

      }

        return $id_equipamento;
    }
  }
  public static function queryListAll($query, $params = array()){
    $statement=1;//evita    Notice: Undefined variable
    //executa count com a função da própria class usando self
    $statement = self::connect()->prepare($query);
    $statement->execute($params);

    if (explode(' ', $query)[0] == 'SELECT') {
      $rows = $statement->fetchALL(PDO::FETCH_OBJ); //associa a rows aos objetos da tabela

      //faz uma varredura para encontrar o objeto
      //foreach ($rows as $list) {
        //associa o valor do obj(coluna da tabela) a var level acesso
        //echo "".$list->login.",</br>";
        //echo "".$list->senha.",</br>";
        //echo "".$list->type_access.",</br>";
      //}
      return $rows;

    }
  }



/*
  public function Select($sql){
    try {
      $statement = $this->pdo

    }catch (PDOException $e) {
      echo $e->getMessage();
    }

  }
  public function Insert($obj, $table)
  {

  }
  public function Update($obj, $condition, $table)
  {
    # code...
  }
  public function Delete($condition, $table)
  {
    # code...
  }
  public function First($obj)
  {
    # code...
  }


  public function setObject($Obj, $Values, $Exists=true)
  {
    if (is_object($Obj)){
      if (count($Values) > 0) {
        foreach ($Values as $in => $va) {
          if (property_exists($Obj, $in) || $Exists) {
            $Obj->$in = $Values->$in
          }
        }
      }
    }
  }
*/



  /*
  }*/

}
?>
