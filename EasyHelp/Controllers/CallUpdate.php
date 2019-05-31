<?php
class CallUpdate extends Controller
{

  function loadCallUpdate()
  {

    //$ID=self::Decript($id);
    require_once './Views/CRUD/CallUpdate.php';
    $pk_id_chamado=self::get($_REQUEST['id_chamado']);//$_REQUEST> post or get


    $FieldInputData=self::queryListAll("SELECT * from tbl_chamados
      WHERE pk_id_chamado='$pk_id_chamado'");


    if (!empty($FieldInputData)) {
            //preenche campos input do form
            foreach ($FieldInputData as $list) {
            $id_chamado=$list->pk_id_chamado;
            $prioridade=$list->prioridade;
            $descricao=$list->descricao;
            $categoria=$list->categoria;
            $status=$list->status;

            }

    $data['pk_id_chamado']= $id_chamado;
    $data['prioridade']= $prioridade;
    $data['descricao']= $descricao;
    $data['categoria']= $categoria;
    $data['status']= $status;


    }
    return $data;
//caso usuario seja ADMINISTRADOR || TECNICO tem acesso para mudar o status
  }// fun


  function checkCallUpdate( $prioridade, $descricao,
   $categoria,$id_equip, $status, $id_chamado, $datahora_updt){

     require_once './Views/CRUD/CallUpdate.php';
      if(self::$VerifyUserConnect == 1 || self::$VerifyUserConnect == 2
      || self::$VerifyUserConnect == 3){

      //altera usuário igual id passada pelo get

      $result=self::queryUpdate("UPDATE tbl_chamados SET prioridade='$prioridade',
        descricao='$descricao', categoria='$categoria', status='$status',
        tbl_chamados.atualizado_em = STR_TO_DATE('$datahora_updt', '%Y-%m-%d %H:%i:%s')
        WHERE tbl_chamados.pk_id_chamado = $id_chamado ");


      $updt_reg_chamado=self::queryUpdate("UPDATE tbl_reg_chamado
        SET fk_id_equipamento='$id_equip'
        WHERE fk_id_chamado='$id_chamado'");


        if ($result == "Success" && $updt_reg_chamado == "Success") {

        echo "<p>Chamado altualizado</p>";
        echo '<a href="./call-create"><button type="button">Adicionar chamado</button></a>';
        echo '<a href="./call-management"><button type="button">Lista de chamados</a>';
        }else {
        echo '<p>FALHA AO ACESSAR O DB</p>';
        echo $result;
        echo $updt_reg_chamado;
        echo '<a href="./call-management">Voltar a gerenciar chamados</a>';
        }


      }else {
      echo "<p><strong>Acess denied</strong></p>";
    }
    echo'
    </tr>
    </form>
  </fieldset>

  </body>
  </html>';
}//FUN
}//class
?>
