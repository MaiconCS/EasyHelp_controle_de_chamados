<?php
class EquipmentManagement extends Controller {

  function loadEquipmentManagement(){

    echo self::$VerifyUserConnect;
    require_once './Views/CRUD/EquipmentManagement.php';

      $listAll=self::queryListAll("SELECT tbl_equipamentos.pk_id_equipamento,
                  tbl_equipamentos.nome_equipamento,
                  tbl_equipamentos.modelo,
                  tbl_setores.nome_setor,
                  tbl_setores.local,
                  DATE_FORMAT(tbl_equipamentos.criado_em, '%d/%m/%Y %H:%i:%s') as adicionado,
                  DATE_FORMAT(tbl_equipamentos.atualizado_em, '%d/%m/%Y %H:%i:%s') as atualizado
               FROM tbl_reg_equipamento_setor

               JOIN
               tbl_equipamentos
               ON tbl_reg_equipamento_setor.fk_id_equipamento=tbl_equipamentos.pk_id_equipamento

               JOIN
               tbl_setores
               ON  tbl_reg_equipamento_setor.fk_id_setor=tbl_setores.pk_id_setor");

      $listAll = array_reverse($listAll);

      if (!empty($listAll)) {
              $QTD = 1;
              foreach ($listAll as $list) {//continua de <tbody>
                echo '
                  <tr>
                    <td>' .$QTD++. '</td>
                    <td>' .$list->pk_id_equipamento.'</td>
                    <td>' .$list->nome_equipamento.'</td>
                    <td>' .$list->modelo.'</td>
                    <td>' .$list->nome_setor.'</td>
                    <td>' .$list->local.'</td>
                    <td>' .$list->adicionado.'</td>
                    <td>' .$list->atualizado.'</td>';

              if(self::$VerifyUserConnect == 1 ){
                echo '
                <td>
                <!-- extensão .php removida POR CAUSA DAS ROTAS-->
                <a href="./equipment-update?id_equipamento='.self::encript($list->pk_id_equipamento).'"> EDITAR </a>
                |<a href="./equipment-delete?id_equipamento='.self::encript($list->pk_id_equipamento).'"> EXCLUIR </a>
                    </td>
                  </tr>
                ';}
              }//foreach
      }else{
        echo '<tr><td colspan="5">Não há objetos no DB</td></tr>';
      }
   echo'
   </tbody>
</table>
</form>
</div>
</fieldset>
</center>
</body>
</html> ';


  }//FUN

  function checkEquipmentManagement(){

    echo self::$VerifyUserConnect;
    require_once './Views/CRUD/EquipmentManagement.php';

      $listAll=self::queryListAll("SELECT tbl_equipamentos.pk_id_equipamento,
                  tbl_equipamentos.nome_equipamento,
                  tbl_equipamentos.modelo,
                  tbl_setores.nome_setor,
                  tbl_setores.local,
                  DATE_FORMAT(tbl_equipamentos.criado_em, '%d/%m/%Y %H:%i:%s') as adicionado,
                  DATE_FORMAT(tbl_equipamentos.atualizado_em, '%d/%m/%Y %H:%i:%s') as atualizado
               FROM tbl_reg_equipamento_setor

               JOIN
               tbl_equipamentos
               ON tbl_reg_equipamento_setor.fk_id_equipamento=tbl_equipamentos.pk_id_equipamento

               JOIN
               tbl_setores
               ON  tbl_reg_equipamento_setor.fk_id_setor=tbl_setores.pk_id_setor

               WHERE  tbl_equipamentos.pk_id_equipamento LIKE '{$_POST['id_equip']}'
               OR tbl_equipamentos.nome_equipamento LIKE '{$_POST['nome_equip']}%'
               OR tbl_equipamentos.modelo LIKE '{$_POST['modelo']}%'
               OR tbl_setores.nome_setor LIKE '{$_POST['setor']}%'
               OR tbl_setores.local LIKE '{$_POST['local']}%';

               ");

      $listAll = array_reverse($listAll);

      if (!empty($listAll)) {
              $QTD = 1;
              foreach ($listAll as $list) {//continua de <tbody>
                echo '
                  <tr>
                    <td>' .$QTD++. '</td>
                    <td>' .$list->pk_id_equipamento.'</td>
                    <td>' .$list->nome_equipamento.'</td>
                    <td>' .$list->modelo.'</td>
                    <td>' .$list->nome_setor.'</td>
                    <td>' .$list->local.'</td>
                    <td>' .$list->adicionado.'</td>
                    <td>' .$list->atualizado.'</td>';

              if(self::$VerifyUserConnect == 1 ){
                echo '
                <td>
                <!-- extensão .php removida POR CAUSA DAS ROTAS-->
                <a href="./equipment-update?id_equipamento='.self::encript($list->pk_id_equipamento).'"> EDITAR </a>
                |<a href="./equipment-delete?id_equipamento='.self::encript($list->pk_id_equipamento).'"> EXCLUIR </a>
                    </td>
                  </tr>
                ';}
              }//foreach
      }else{
        echo '<tr><td colspan="5">Não há objetos no DB</td></tr>';
      }
   echo'
   </tbody>
</table>
</form>
</div>
</fieldset>
</center>
</body>
</html> ';


  }//FuN


}
?>
