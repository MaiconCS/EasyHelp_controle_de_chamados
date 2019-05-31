<?php
class SectorCreate extends Controller{

  function checkSectorCreate($nome_setor, $local, $ramal, $datahora_bd){
      $tipo_acesso=self::$VerifyUserConnect;

    //verifica tipo de usuario
    if($tipo_acesso== 1){

//-------------------------------------insert setor------------------------------------------------

$result=self::queryInsert("INSERT INTO tbl_setores SET nome_setor='$nome_setor',
  local='$local', ramal='$ramal',
  tbl_setores.criado_em= STR_TO_DATE('{$datahora_bd}', '%Y-%m-%d %H:%i:%s'),
  tbl_setores.atualizado_em = STR_TO_DATE('{$datahora_bd}', '%Y-%m-%d %H:%i:%s')");

      if ($result == "Success") {
        echo '<br>Setor criado voltar a ';
        echo '<a href="./sector-management"><button type="button">Lista de setores</button></a>';
      }else {
        echo '<p>FALHA AO ACESSAR O DB</p>';
        echo $result;
        echo '<a href="./sector-management">Voltar a gerenciar setores</a>';
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
