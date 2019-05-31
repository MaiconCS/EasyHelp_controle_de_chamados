<?php
class CallCreate extends Controller{

  function checkCallCreate($prioridade, $descricao, $categoria,$id_equipamento,
  $status,$datahora_bd){
    $tipo_acesso=self::$VerifyUserConnect;


    //verifica tipo de usuario
    if($tipo_acesso== 1 || $tipo_acesso == 2 ||
     $tipo_acesso == 3){

       $login=$_SESSION["login"];
       $senha=$_SESSION["senha"];
//-------------------------------------id usuario------------------------------------------------
       $id_usuario=self::queryVerifyUserId("SELECT pk_id_usuario FROM tbl_usuarios
         WHERE login ='$login' and senha ='$senha' and fk_id_acesso ='$tipo_acesso'");

//-------------------------------------insert chamado------------------------------------------------
      //foamto do BD Y-month-day  h:min:sec


      $result=self::queryInsert("INSERT INTO tbl_chamados SET prioridade='$prioridade',
        descricao='$descricao', categoria='$categoria', status='$status',
        tbl_chamados.criado_em= STR_TO_DATE('{$datahora_bd}', '%Y-%m-%d %H:%i:%s'),
        tbl_chamados.atualizado_em = STR_TO_DATE('{$datahora_bd}', '%Y-%m-%d %H:%i:%s')");

//---------------------------busca-id-chamado-------------------------------------------------------------
      $id_chamado=self::queryVerifyCallId("SELECT pk_id_chamado FROM tbl_chamados
      WHERE descricao = '$descricao' AND
      tbl_chamados.criado_em = STR_TO_DATE('{$datahora_bd}','%Y-%m-%d %H:%i:%s')");

//-------------------------insert-reg-chamado-------------------------------------------------------------

      $reg_chamado=self::queryInsert("INSERT INTO tbl_reg_chamado (fk_id_chamado,fk_id_usuario,fk_id_equipamento)
       VALUES ('$id_chamado', '$id_usuario', '$id_equipamento')");


//----------------------------------------------------------------------------------------------------------------

      if ($result == "Success" && $reg_chamado == "Success" ) {
        echo '<br><br>Chamado registrado as '.$datahora_bd.' voltar a ';
        echo '<a href="./call-management"><button type="button">Lista de chamados</button></a>';
      }else {
        echo '<p>FALHA AO ACESSAR O DB</p>';
        echo $result;
        echo $reg_chamado;
        echo '<a href="./call-management">Voltar a gerenciar chamados</a>';
      }

    }else {
      echo "<p><strong>Access denied</strong></p>";

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
