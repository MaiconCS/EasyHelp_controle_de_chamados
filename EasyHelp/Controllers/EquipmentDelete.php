<?php

class EquipmentDelete extends Controller
{

  function checkEquipmentDelete(){

    self::$VerifyUserConnect=self::verifyUserConnect();

    if(self::$VerifyUserConnect == 1 ){

      //chama id
      $id_equipamento=self::get($_REQUEST['id_equipamento']);

      //deleta usuário igual id passada pelo get
      $result=self::queryDelete("DELETE FROM tbl_reg_equipamento_setor
         WHERE fk_id_equipamento=$id_equipamento");

        if ($result == "Success") {
          echo "<p>Equipamento Removido</p>";
          echo '<a href="./home"><button type="button">Voltar a Home</a>';
          echo '<a href="./equipment-management"><button type="button"  class="w3-button w3-light-green">Lista de equipamentos</button></a>';
        }else {
          echo '<p>FALHA AO ACESSAR O DB</p>';
          echo $result;
          echo '<a href="./equipment-management">Voltar a gerenciar equipamentos</a>';
        }

      }else {
      echo "<p><strong>Access denied</strong></p>";
    }

  }
}
?>
