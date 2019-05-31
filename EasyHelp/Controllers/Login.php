<?php

class Login extends Controller{

  public function checkLogin($login, $senha){

    $total_reg = self::queryCountReg("SELECT * FROM tbl_usuarios");

  if (isset($login) && isset($senha) &&
      !$login==NULL && !$senha==NULL) {



    if ($total_reg == 0) {//se não houver registros

      session_start();
      $_SESSION["login"]=$login;//$_POST["login"];
      $_SESSION["senha"]=$senha;//$_POST["senha"];
      $_SESSION["tipo_acesso"]= 1;// user is adm no primeiro login

      echo'<p><strong>Primeiro Acesso!</strong></p>';
      echo"<p>Não há usuarios cadastrados no DB.</p>";
      echo"<p> Cadastre um <strong>ADMINISTRADOR</strong> para gerenciar o sistema. </p>";
      sleep(5);//SECUNDOS
      header("Location: user-create");//tela para criar usuario

      }elseif ($total_reg>0) {

        $usr_psw=self::queryVerifyUserPsw("SELECT senha FROM tbl_usuarios
          WHERE login ='$login'");
        $senha64=self::decript($usr_psw);

        if($senha64 == $senha){
          //recebe array com indices
          $level_access=self::queryVerifyAccess("SELECT fk_id_acesso
             FROM tbl_usuarios WHERE login ='$login' and senha ='$usr_psw'");

          $id_access=self::queryVerifyUserId("SELECT pk_id_usuario FROM tbl_usuarios
            WHERE login ='$login' and senha ='$usr_psw'");


        }else {
          echo "<p><strong>Senha inválida!</strong></p>";
        }

        if (1==$level_access ||
            2==$level_access ||
            3==$level_access) {

          session_start();//usado para restringir o acesso as paginas do programa
          $_SESSION["login"]=$login;//$_POST["login"];
          $_SESSION["senha"]=$usr_psw;//$_POST["senha"];
          $_SESSION["id_usuario"]=$id_access;
          $_SESSION["tipo_acesso"]=$level_access;


          echo 'Access Granted!';
          sleep(2);
          header("Location: home");

        }else {
          echo "<p><strong>Authentication Failed!</strong> Verifique login e senha!</p>";
          sleep(5);
          header("Location: login");//volta p/ tela de login
        }

      } else {
        echo "<p><strong>Access denied</strong> Verifique login e senha!</p>";
        sleep(5);
        header("Location: login");//volta p/ tela de login
      }

    }else{
        echo "<p><strong>Access denied</strong> Verifique login e senha!</p>";
        sleep(5);
        header("Location: login");
    }
      //verificar login iguais no db_test
      exit;
    }//FUN CheckLogin
}//Classe
?>
