<?php

class CallDelete extends Controller
{

  function checkCallDelete(){

    self::$VerifyUserConnect=self::verifyUserConnect();

    if(self::$VerifyUserConnect ==1){//1== admin

      //chama id
      $id_chamado=self::get($_REQUEST['id_chamado']);

      //deleta usuário igual id passada pelo get
      $result=self::queryDelete("DELETE FROM tbl_reg_chamado
        WHERE fk_id_chamado=$id_chamado");

        if ($result == "Success") {
          echo "<p>Chamado Removido</p>";
          echo '<a href="./home"><button type="button" class="w3-button w3-light-blue">Voltar a Home</button></a>';
          echo '<a href="./call-management"><button type="button" class="w3-button w3-light-green" >Lista de chamados</button></a>';
        }else {
          echo '<p>FALHA AO ACESSAR O DB</p>';
          echo $result;
          echo '<a href="./call-management">Voltar a gerenciar chamados</a>';
        }

      }else {
      echo "<p><strong>Access denied</strong></p>";
    }

  }
}
?>
