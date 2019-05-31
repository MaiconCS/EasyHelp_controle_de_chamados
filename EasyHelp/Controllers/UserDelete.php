<?php

class UserDelete extends Controller
{

  function checkUserDelete(){

    self::$VerifyUserConnect=self::verifyUserConnect();

    if(self::$VerifyUserConnect == 1 ){

      //chama id
      $id=self::get($_REQUEST['id_usuario']);

      //deleta usuário igual id passada pelo get
      $result=self::queryDelete("DELETE FROM tbl_reg_usuario_setor
         WHERE fk_id_usuario=$id");


        if ($result == "Success") {
          echo "<p>Usuário Removido</p>";
          echo '<a href="./home"><button type="button">Voltar a Home</a>';
          echo '<a href="./user-management"><button type="button"  class="w3-button w3-light-green">Lista de usuários</button></a>';
        }else {
          echo '<p>FALHA AO ACESSAR O DB</p>';
          echo $result;
          echo '<a href="./user-management">Voltar a gerenciar usuários</a>';
        }

      }else {
      echo "<p><strong>Access denied</strong></p>";
    }

  }
}
?>
