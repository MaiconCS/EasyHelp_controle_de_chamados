<?php
class EquipmentUpdate extends Controller
{
  //passa o id get por get definido na pagina da lista de usuario
  //passa login senha e tipo de acesso por post

  function loadEquipmentUpdate()
  {
    //$ID=self::Decript($id);
    require_once './Views/CRUD/EquipmentUpdate.php';
    $pk_id_equipamento=self::get($_REQUEST['id_equipamento']);

    $FieldInputData=self::queryListAll("SELECT * from tbl_equipamentos
      WHERE pk_id_equipamento='$pk_id_equipamento'");

    if (!empty($FieldInputData)) {
            //preenche campos input do form
            foreach ($FieldInputData as $list) {
            $id_equipamento=$list->pk_id_equipamento;
            $nome_equipamento=$list->nome_equipamento;
            $modelo=$list->modelo;
            }

    $data['pk_id_equipamento']= $id_equipamento;
    $data['nome_equipamento']= $nome_equipamento;
    $data['modelo']= $modelo;

    }return $data;

  }
  function checkEquipmentUpdate($nome_equipamento, $modelo, $id_setor,
  $id_equipamento, $datahora_updt){
      require_once './Views/CRUD/EquipmentUpdate.php';

      if(self::$VerifyUserConnect == 1){

      //altera usuário igual id passada pelo get
      $result=self::queryUpdate("UPDATE tbl_equipamentos SET
        nome_equipamento='$nome_equipamento', modelo='$modelo',
        tbl_equipamentos.atualizado_em = STR_TO_DATE('$datahora_updt', '%Y-%m-%d %H:%i:%s')
        WHERE pk_id_equipamento='$id_equipamento'");

      $updt_reg_equipamento=self::queryUpdate("UPDATE tbl_reg_equipamento_setor
        SET fk_id_setor='$id_setor'
        WHERE fk_id_equipamento='$id_equipamento'");

        if ($result == "Success" && $updt_reg_equipamento == "Success") {
        echo "<p>Equipamento altualizado</p>";
        echo '<a href="./equipment-create"><button type="button">Adicionar equipamento</button></a>';
        echo '<a href="./equipment-management"><button type="button">Lista de equipamentos</button></a>';
        }else {
        echo '<p>FALHA AO ACESSAR O DB</p>';
        echo $result;
        echo $updt_reg_equipamento;
        echo '<a href="./equipment-management">Voltar a gerenciar equipamentos</a>';
        }

      }else {
      echo "<p><strong>Acess denied</strong></p>";
    }
      echo '
      </tr>
      </form>
    </fieldset>

    </body>
    </html>';
  }
}
?>
