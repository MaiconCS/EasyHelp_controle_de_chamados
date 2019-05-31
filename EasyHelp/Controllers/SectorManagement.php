<?php
class SectorManagement extends Controller {

  function loadSectorManagement(){


    require_once './Views/CRUD/SectorManagement.php';

      $listAll=self::queryListAll("SELECT tbl_setores.pk_id_setor,
        tbl_setores.nome_setor,
        tbl_setores.local,
        tbl_setores.ramal,
        DATE_FORMAT(tbl_setores.criado_em, '%d/%m/%Y %H:%i:%s') as adicionado,
        DATE_FORMAT(tbl_setores.atualizado_em, '%d/%m/%Y %H:%i:%s') as atualizado
          FROM tbl_setores");

      $listAll = array_reverse($listAll); //reverte arr
      if (!empty($listAll)) {
        $QTD = 1;
        foreach ($listAll as $list) {//continua de <tbody>
          echo '
            <tr>
             <td>' .$QTD++. '</td>
             <td>' .$list->nome_setor.'</td>
              <td>' .$list->local.'</td>
             <td>' .$list->ramal.'</td>
             <td>' .$list->adicionado.'</td>
             <td>' .$list->atualizado.'</td>
             ';
        if(self::$VerifyUserConnect == 1 ){
         echo '
             <td>
             <!-- extensão .php removida POR CAUSA DAS ROTAS-->
             <a href="./sector-update?id_setor='.self::encript($list->pk_id_setor).'"> EDITAR </a>
             |<a href="./sector-delete?id_setor='.self::encript($list->pk_id_setor).'">
             EXCLUIR </a>
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

  function checkSectorManagement(){


    require_once './Views/CRUD/SectorManagement.php';

      $listAll=self::queryListAll("SELECT tbl_setores.pk_id_setor,
      tbl_setores.nome_setor,
      tbl_setores.local,
      tbl_setores.ramal,
      DATE_FORMAT(tbl_setores.criado_em, '%d/%m/%Y %H:%i:%s') as adicionado,
      DATE_FORMAT(tbl_setores.atualizado_em, '%d/%m/%Y %H:%i:%s') as atualizado
      FROM tbl_setores
        WHERE  tbl_setores.nome_setor LIKE '{$_POST['nome_str']}%'
        OR tbl_setores.local LIKE '{$_POST['local']}%'
        OR tbl_setores.ramal LIKE '{$_POST['ramal']}%';

      ");

      $listAll = array_reverse($listAll); //reverte arr
      if (!empty($listAll)) {
        $QTD = 1;
        foreach ($listAll as $list) {//continua de <tbody>
          echo '
            <tr>
             <td>' .$QTD++. '</td>
             <td>' .$list->nome_setor.'</td>
             <td>' .$list->local.'</td>
             <td>' .$list->ramal.'</td>
             <td>' .$list->adicionado.'</td>
             <td>' .$list->atualizado.'</td>
             ';
        if(self::$VerifyUserConnect == 1 ){
         echo '
             <td>
             <!-- extensão .php removida POR CAUSA DAS ROTAS-->
             <a href="./sector-update?id_setor='.self::encript($list->pk_id_setor).'"> EDITAR </a>
             |<a href="./sector-delete?id_setor='.self::encript($list->pk_id_setor).'">
             EXCLUIR </a>
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


}//CLASS
?>
