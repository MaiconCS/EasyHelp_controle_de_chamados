<?php
class CallManagement extends Controller {

  function loadCallManagement(){

   self::$VerifyUserConnect;
   require_once './Views/CRUD/CallManagement.php';
   echo "<!-- LOADCALL managemente-->";
   //data em formato dia mes ano
      $listAll=self::queryListAll("SELECT tbl_chamados.pk_id_chamado,
        tbl_usuarios.pk_id_usuario,
        tbl_usuarios.nome_usuario,
     		tbl_chamados.prioridade,
     		tbl_chamados.descricao,
     		tbl_chamados.categoria,
        tbl_equipamentos.pk_id_equipamento,
     		tbl_equipamentos.nome_equipamento,
        tbl_chamados.status,
        DATE_FORMAT(tbl_chamados.criado_em, '%d/%m/%Y %H:%i:%s') as adicionado,
        DATE_FORMAT(tbl_chamados.atualizado_em, '%d/%m/%Y %H:%i:%s') as atualizado
     FROM tbl_reg_chamado

     JOIN
     tbl_chamados
     ON tbl_reg_chamado.fk_id_chamado=tbl_chamados.pk_id_chamado

     JOIN
     tbl_usuarios
     ON tbl_reg_chamado.fk_id_usuario=tbl_usuarios.pk_id_usuario

     JOIN
     tbl_equipamentos
     ON tbl_reg_chamado.fk_id_equipamento=tbl_equipamentos.pk_id_equipamento");

      $listAll = array_reverse($listAll); //reverte arr
      if (!empty($listAll)) {
        $QTD=1;//ordem do banco
              foreach ($listAll as $list) {//continua de <tbody>
                echo '
                  <tr>
                    <td>' .$QTD++.'</td>
                    <td>' .$list->pk_id_chamado.'</td>
                    <td>' .$list->pk_id_usuario.'</td>
                    <td>' .$list->nome_usuario.'</td>
                    <td>' .$list->prioridade.'</td>
                    <td>' .$list->descricao.'</td>
                    <td>' .$list->categoria.'</td>
                    <td>' .$list->pk_id_equipamento.'</td>
                    <td>' .$list->nome_equipamento.'</td>
                    <td>' .$list->status.'</td>
                    <td>' .$list->adicionado.'</td>
                    <td>' .$list->atualizado.'</td>
                    <td>
                  <!-- extensão .php removida POR CAUSA DAS ROTAS-->';

      if(self::$VerifyUserConnect ==1 || self::$VerifyUserConnect ==2  ||
      $list->pk_id_usuario==$_SESSION["id_usuario"]){
          echo
          '<a href="./call-update?id_chamado='.self::encript($list->pk_id_chamado).'">
                  EDITAR </a>';}

      if(self::$VerifyUserConnect == 1 ){
          echo '
          |<a href="./call-delete?id_chamado='.self::encript($list->pk_id_chamado).'">
                  EXCLUIR </a>
                    </td>
                  </tr>
                ';}
              }//for
      }else{
        echo '

        <tr><td colspan="5">Não há objetos no DB</td></tr>';
      }
   echo'
         </td>
      </tr>
    </tbody>
</table>
</form>
</div>
</fieldset>
</center>
</body>
</html> ';

}//fun

//--------------------------------------------------------------------------------------------------------

  function checkCallManagement(){

     require_once './Views/CRUD/CallManagement.php';
    //converte para fazer a busca
    /*echo "<!-- CHECK CALL managemente-->";
    if (!$criado_em==NULL && !$criado_em==" "
    && !$atualizado_em==NULL && !$atualizado_em==" ") {
    */
      //$criado_em=date("Y-m-d", strtotime( ".$criado_em." ) );
      //$atualizado_em=date("Y-m-d", strtotime( ".$atualizado_em." ) );
    //}
  

    $listAll=self::queryListAll("SELECT tbl_chamados.pk_id_chamado,
      tbl_usuarios.pk_id_usuario,
      tbl_usuarios.nome_usuario,
      tbl_chamados.prioridade,
      tbl_chamados.descricao,
      tbl_chamados.categoria,
      tbl_equipamentos.pk_id_equipamento,
      tbl_equipamentos.nome_equipamento,
      tbl_chamados.status,
      DATE_FORMAT(tbl_chamados.criado_em, '%d-%m-%Y %H:%i:%s') as adicionado,
      DATE_FORMAT(tbl_chamados.atualizado_em, '%d-%m-%Y %H:%i:%s') as atualizado

   FROM tbl_reg_chamado

   JOIN
   tbl_chamados
   ON tbl_reg_chamado.fk_id_chamado=tbl_chamados.pk_id_chamado

   JOIN
   tbl_usuarios
   ON tbl_reg_chamado.fk_id_usuario=tbl_usuarios.pk_id_usuario

   JOIN
   tbl_equipamentos
   ON tbl_reg_chamado.fk_id_equipamento=tbl_equipamentos.pk_id_equipamento

   WHERE tbl_chamados.pk_id_chamado LIKE '{$_POST['id_chamado']}' OR tbl_usuarios.pk_id_usuario LIKE '{$_POST['id_req']}'
   OR tbl_usuarios.nome_usuario LIKE '{$_POST['requerente']}%' OR tbl_chamados.prioridade LIKE '{$_POST['prioridade']}%'
   OR tbl_chamados.descricao LIKE '{$_POST['descricao']}%' OR tbl_chamados.categoria LIKE '{$_POST['categoria']}%'
   OR tbl_equipamentos.pk_id_equipamento LIKE '{$_POST['id_equip']}' OR tbl_equipamentos.nome_equipamento LIKE '{$_POST['nome_equip']}%'
   OR tbl_chamados.status LIKE '{$_POST['status']}%';
   ");
   // sem possibilidade de consultar chamado por data hora pois o STR_TO_DATE pede
  // tambem os secundos para poder comparar

    $listAll = array_reverse($listAll); //reverte arr
    if (!empty($listAll)) {
      $QTD=1;//ordem do banco
            foreach ($listAll as $list) {//continua de <tbody>
              echo '
                <tr>
                  <td>' .$QTD++.'</td>
                  <td>' .$list->pk_id_chamado.'</td>
                  <td>' .$list->pk_id_usuario.'</td>
                  <td>' .$list->nome_usuario.'</td>
                  <td>' .$list->prioridade.'</td>
                  <td>' .$list->descricao.'</td>
                  <td>' .$list->categoria.'</td>
                  <td>' .$list->pk_id_equipamento.'</td>
                  <td>' .$list->nome_equipamento.'</td>
                  <td>' .$list->status.'</td>
                  <td>' .$list->adicionado.'</td>
                  <td>' .$list->atualizado.'</td>
                  <td>
                <!-- extensão .php removida POR CAUSA DAS ROTAS-->';

    if(self::$VerifyUserConnect ==1 || $list->pk_id_usuario==$_SESSION["id_usuario"]){
            echo '<a href="./call-update?
                id_chamado='.self::encript($list->pk_id_chamado).'">
                EDITAR </a>';}

    if(self::$VerifyUserConnect ==1 ){
              echo '
                |<a href="./call-delete?
                id_chamado='.self::encript($list->pk_id_chamado).'">
                *EXCLUIR </a>
                  </td>
                </tr>
              ';}
            }//foreach
    }else{
      echo '

      <tr><td colspan="5">Não há objetos no DB</td></tr>';
    }
 echo'
       </td>
    </tr>
  </tbody>
</table>
</form>
</div>
</fieldset>
</center>
</body>
</html> ';

  }//function


}//class
?>
