<?php
class EquipmentCreate extends Controller{

  function checkEquipmentCreate($nome_equipamento, $modelo, $id_setor, $datahora_bd){

      $tipo_acesso=self::$VerifyUserConnect;
    //verifica tipo de usuario
    if($tipo_acesso== 1){

//-------------------------------------insert equipamento------------------------------------------------

$result=self::queryInsert("INSERT INTO tbl_equipamentos SET nome_equipamento='$nome_equipamento',
  modelo='$modelo',
  tbl_equipamentos.criado_em= STR_TO_DATE('{$datahora_bd}', '%Y-%m-%d %H:%i:%s'),
  tbl_equipamentos.atualizado_em = STR_TO_DATE('{$datahora_bd}', '%Y-%m-%d %H:%i:%s')");

//---------------------------busca-id-equipamento-------------------------------------------------------------

$id_equipamento=self::queryVerifyEquipmentId("SELECT pk_id_equipamento FROM tbl_equipamentos
WHERE nome_equipamento = '$nome_equipamento' AND modelo='$modelo' AND
tbl_equipamentos.criado_em = STR_TO_DATE('{$datahora_bd}','%Y-%m-%d %H:%i:%s')");


//-------------------------insert-reg-equipamento-------------------------------------------------------------

$reg_chamado=self::queryInsert("INSERT INTO tbl_reg_equipamento_setor
  (fk_id_equipamento,fk_id_setor) VALUES ('$id_equipamento', '$id_setor')");


      if ($result == "Success" && $reg_chamado== "Success" ) {
        echo '<br>Equipamento adicionado voltar a ';
        echo '<a href="./equipment-management"><button type="button">Lista de equipmentos</button></a>';
      }else {
        echo 'FALHA AO ACESSAR O DB';
        echo $result;
        echo '<a href="./equipment-management">Voltar a gerenciar equipmentos</a>';
      }


    }else {
      echo "<p><strong>Access denied</strong></p>";

    }
    echo '
           </tr>
          </form>
        </fieldset>

      </body>
    </html>
      ';
  }
}
?>
