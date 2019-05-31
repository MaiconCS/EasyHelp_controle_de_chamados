<?php
class SectorUpdate extends Controller
{
  //passa o id get por get definido na pagina da lista de usuario
  //passa login senha e tipo de acesso por post

  function loadSectorUpdate(){
    //$ID=self::Decript($id);
    require_once './Views/CRUD/SectorUpdate.php';
    $pk_id_setor=self::get($_REQUEST['id_setor']);
    $FieldInputData=self::queryListAll("SELECT * from tbl_setores
      WHERE pk_id_setor='$pk_id_setor'");

    if (!empty($FieldInputData)) {
            //preenche campos input do form
            foreach ($FieldInputData as $list) {
            $pk_id_setor=$list->pk_id_setor;
            $nome_setor=$list->nome_setor;
            $local=$list->local;
            $ramal=$list->ramal;

            }
   $data['pk_id_setor']= $pk_id_setor;
   $data['nome_setor']= $nome_setor;
   $data['local']= $local;
   $data['ramal']= $ramal;


  }return $data;
}
  function checkSectorUpdate($nome_setor, $local, $ramal, $id_setor, $datahora_updt){
    require_once './Views/CRUD/SectorUpdate.php';

    if(self::$VerifyUserConnect == 1){

      //altera usuário igual cod_setor passada pelo get
      $result=self::queryUpdate("UPDATE tbl_setores SET nome_setor='$nome_setor',
        local='$local', ramal='$ramal',
        tbl_setores.atualizado_em = STR_TO_DATE('$datahora_updt', '%Y-%m-%d %H:%i:%s')
        WHERE pk_id_setor='$id_setor'");

        if ($result == "Success") {
        echo "<p>Setor altualizado</p>";
        echo '<a href="./sector-create"><button type="button">Adicionar setor</a>';
        echo '<a href="./sector-management"><button type="button">Lista de setores</a>';
        }else {
        echo '<p>FALHA AO ACESSAR O DB</p>';
        echo $result;
        echo '<a href="./sector-management">Voltar a gerenciar setores</a>';
        }

      }else {
      echo "<p><strong>Acess denied</strong></p>";
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
