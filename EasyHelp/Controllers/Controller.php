<?php

  class Controller extends Model{
    // constante ??
    protected static $VerifyUserConnect;

    public static function listEquipment(){
      //carrega pagina pela 1 vez
      $equipments=self::queryListAll("SELECT pk_id_equipamento,nome_equipamento FROM tbl_equipamentos");

      if (empty($equipments)) {
        return "Não Há equipamentos";
      }
      return $equipments;
    }
    public static function listSector(){
      //carrega pagina pela 1 vez
      $sector=self::queryListAll("SELECT pk_id_setor,nome_setor FROM tbl_setores");

      if (empty($sector)) {
        return "Não Há setores";
      }
      return $sector;
    }
    public static function listAccess(){
      //carrega pagina pela 1 vez
      $access=self::queryListAll("SELECT pk_id_acesso,nome_acesso FROM tbl_tipo_acesso");

      if (empty($access)) {
        return "Não Há acessos";
      }
      return $access;
    }

    public static function encript($data){
        return base64_encode($data);
    }
    public static function decript($data){
        return base64_decode($data);
    }
    public static function get($primary_key){
      //desencripta
      if (!$_GET==NULL && !$_GET=='') {
        //verifica existencia de GET com indice id
        if (array_key_exists('id_usuario', $_GET)) {
          $primary_key=self::decript($_GET['id_usuario']);
        }elseif (array_key_exists('id_chamado', $_GET)) {
          $primary_key=self::decript($_GET['id_chamado']);
        }elseif (array_key_exists('id_equipamento', $_GET)) {
          $primary_key=self::decript($_GET['id_equipamento']);
        }elseif (array_key_exists('id_setor', $_GET)) {
          $primary_key=self::decript($_GET['id_setor']);
        }

      return $primary_key;
      }

    }
    public static function verifyUserConnect(){
      //só executa
      //verifica usuario conectado e verifica privilégios

      date_default_timezone_set('America/Sao_Paulo');

        session_start();

        if(!isset($_SESSION["login"]) || !isset($_SESSION["senha"])) {
          header("Location: login");
          exit;
        }else {

          $level_access = $_SESSION["tipo_acesso"];

          return $level_access;
        }
      }

      //parametro da função é o nome do arquivo php na view definido em routeS
      static function createView($viewName){
        //verifica pagina
        if ($viewName=='Login') {
          require_once("./Views/$viewName.php");

          if (!$_POST=="" && isset($_POST)) {
            static::checkLogin($_POST["login"], $_POST["senha"]);
          }

        }elseif ($viewName=='Logout') {

          static::checkLogout();

        }elseif ($viewName=='Home') {
          require_once("./Views/$viewName.php");
          self::$VerifyUserConnect=self::verifyUserConnect();

          static::checkHome();

        }
        //--CRUD--CHAMADOS------------------------------------------
        elseif ($viewName=='CallCreate') {
            require_once("./Views/CRUD/$viewName.php");
            self::$VerifyUserConnect=self::verifyUserConnect();

            if (!$_POST=="" && isset($_POST)) {
              static::checkCallCreate($_POST['prioridade'],
              $_POST['descricao'], $_POST['categoria'],
              $_POST['equipamento'], $_POST['status'],
              $_POST['datahora']);
            }

        }elseif ($viewName=='CallManagement') {
          //require_once("./Views/CRUD/$viewName.php");
          self::$VerifyUserConnect=self::verifyUserConnect();
          if($_POST) {
            static::checkCallManagement();
          }else {
            static::loadCallManagement();
          }

        }elseif ($viewName=='CallUpdate') {

          self::$VerifyUserConnect=self::verifyUserConnect();

            if(!$_POST=="" && !empty($_POST)) {
              static::checkCallUpdate($_POST['prioridade'],$_POST['descricao'],
              $_POST['categoria'],$_POST['equipamento'], $_POST['status'],
               $_POST['id_chamado'],$_POST['datahora_updt']);
            }else {
              static::loadCallUpdate();
            }

        }
        //--CRUD--SETOR------------------------------------------
        elseif ($viewName=='SectorCreate') {
            require_once("./Views/CRUD/$viewName.php");
            if (!isset(self::$VerifyUserConnect)) {
              self::$VerifyUserConnect=self::verifyUserConnect();
            }
            if (!$_POST=="" && isset($_POST)) {
              static::checkSectorCreate($_POST["nome_setor"], $_POST["local"],
              $_POST['ramal'], $_POST['datahora']);
            }
        }elseif ($viewName=='SectorManagement') {
            self::$VerifyUserConnect=self::verifyUserConnect();
            if($_POST) {
              static::checkSectorManagement();
            }else{
              static::loadSectorManagement();
            }
        }elseif ($viewName=='SectorUpdate') {

            if (!isset(self::$VerifyUserConnect)) {
              self::$VerifyUserConnect=self::verifyUserConnect();
            }
            if(!$_POST=="" && isset($_POST)) {
              static::checkSectorUpdate( $_POST["nome_setor"], $_POST["local"],
               $_POST['ramal'], $_POST['id_setor'], $_POST['datahora_updt']);
            }else{
              static::loadSectorUpdate();
            }

        }
        //--CRUD--EQUIPAMENTOS------------------------------------------
        elseif ($viewName=='EquipmentCreate') {
              require_once("./Views/CRUD/$viewName.php");
              self::$VerifyUserConnect=self::verifyUserConnect();

              if (!$_POST=="" && isset($_POST)) {
                static::checkEquipmentCreate($_POST["nome_equipamento"],
                $_POST['modelo'],$_POST['setor'],$_POST['datahora']);
              }

        }elseif ($viewName=='EquipmentManagement') {

            self::$VerifyUserConnect=self::verifyUserConnect();
            if($_POST){
              static::checkEquipmentManagement();
            }else{
            static::loadEquipmentManagement();
            }

        }elseif ($viewName=='EquipmentUpdate') {

          self::$VerifyUserConnect=self::verifyUserConnect();

          if(!$_POST=="" && isset($_POST)) {
            static::checkEquipmentUpdate($_POST["nome_equipamento"],
             $_POST["modelo"], $_POST['setor'],$_POST['id_equipamento'],
           $_POST['datahora_updt']);
          }else {
            static::loadEquipmentUpdate();
          }

        }
        //-------------CRUD--USER--------------------
        elseif ($viewName=='UserCreate') {
          require_once("./Views/CRUD/$viewName.php");

              if (!isset(self::$VerifyUserConnect)) {
                self::$VerifyUserConnect=self::verifyUserConnect();
              }
              if (!$_POST=="" && isset($_POST)) {
                static::checkUserCreate($_POST["nome_usuario"],$_POST["login"],
                $_POST["senha"],$_POST['tipo_acesso'],$_POST['setor'], $_POST['datahora']);
              }

        }elseif ($viewName=='UserManagement') {

            self::$VerifyUserConnect=self::verifyUserConnect();
            if($_POST) {
              static::checkUserManagement();
            }else{
              static::loadUserManagement();
            }
        }elseif ($viewName=='UserUpdate') {
            //static::loadData();
            //static::loadUserUpdate();
            //tela managemente envia get para user-update
            //o q faz com q carregue primeiro a InLoading,pois não a post sendo executado e é necessario converter o id de get para post pois PDO acusa violação de acesso quando se tenta passar GET e depois passar POST crazy
            //apos post ser executado é redirecionado os dados novamente para user-update onde é exec CheckUserUpdate

                if (!isset(self::$VerifyUserConnect)) {
                  self::$VerifyUserConnect=self::verifyUserConnect();
                }
                if(!$_POST=="" && isset($_POST)){
                      static::checkUserUpdate($_POST['nome_usuario'],
                      $_POST["login"], $_POST["senha"],$_POST['tipo_acesso'],
                      $_POST['setor'],$_POST['id_usuario'],$_POST['datahora_updt']);

                }else{
                  static::loadUserUpdate();
                }

          //require_once("./Views/CRUD/$viewName.php");
        }
        //----------------------------------------------------------------
         else {
          echo "404 not found, check names on controller";
        }


    }//Fun createView
  }//Class Controller
?>
