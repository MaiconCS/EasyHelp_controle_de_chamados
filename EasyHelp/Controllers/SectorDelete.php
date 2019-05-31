<?php

class SectorDelete extends Controller
{

  function checkSectorDelete(){

    self::$VerifyUserConnect=self::verifyUserConnect();

    if(self::$VerifyUserConnect == 1 ){

      //chama id
      $id_setor=self::get($_REQUEST['id_setor']);

      //deleta usuário igual id passada pelo get
      $result=self::queryDelete("DELETE FROM tbl_setores
        WHERE pk_id_setor=$id_setor");

        if ($result == "Success") {
          echo "<p>Setor Removido</p>";
          echo '<a href="./home"><button type="button">Voltar a Home</a>';
          echo '<a href="./sector-management"><button type="button"  class="w3-button w3-light-green">Lista de setores</button></a>';
        }else {
          echo '<p>FALHA AO ACESSAR O DB</p>';
          echo $result;
          echo '<a href="./sector-management">Voltar a gerenciar setores</a>';
        }

      }else {
      echo "<p><strong>Access denied</strong></p>";
    }

  }
}
?>
