<?php
class UserUpdate extends Controller
{
  //passa o pk_id_usuario  por get definido na pagina da lista de usuario
  //passa login senha e tipo de acesso por post
  function loadUserUpdate(){

    require_once './Views/CRUD/UserUpdate.php';

    $getid=self::get($_REQUEST['id_usuario']);
    $FieldInputData=self::queryListAll("SELECT * from tbl_usuarios
      WHERE pk_id_usuario=$getid");


    if (!empty($FieldInputData)) {
            //preenche campos input do form
            foreach ($FieldInputData as $list) {
              $getid=$list->pk_id_usuario;
              $nome_usuario=$list->nome_usuario;
              $login=$list->login;

            //  $list->senha;
            }

    $data['pk_id_usuario']= $getid;
    $data['nome_usuario']= $nome_usuario;
    $data['login']= $login;

    }return $data;
  }

  function checkUserUpdate($nome_usuario, $login, $senha, $id_acesso, $id_setor,
  $id_usuario, $datahora_updt){
      //$VerifyUserConnect = self::VerifyUserConnect();
      require_once './Views/CRUD/UserUpdate.php';
      if(self::$VerifyUserConnect == 1){

          $senha64=self::encript($senha);

      //altera usuário igual pk_id_usuario passada pelo get
      $result=self::queryUpdate("UPDATE tbl_usuarios SET fk_id_acesso='$id_acesso',
        nome_usuario='$nome_usuario', login='$login', senha='$senha64',
        tbl_usuarios.atualizado_em = STR_TO_DATE('$datahora_updt', '%Y-%m-%d %H:%i:%s')
        WHERE pk_id_usuario=$id_usuario");

      $updt_reg_usuario=self::queryUpdate("UPDATE tbl_reg_usuario_setor
        SET fk_id_setor='$id_setor'
        WHERE fk_id_usuario='$id_usuario'");

          if ($result == "Success" && $updt_reg_usuario == "Success") {
          echo "<p>Usuário altualizado</p>";
          echo '<a href="./user-create"><button type="button">Adicionar usuário</button></a>';
          echo '<a href="./user-management"><button type="button">Lista de usuários</button></a>';
          }else {
          echo '<p>FALHA AO ACESSAR O DB</p>';
          echo $result;
          echo $updt_reg_usuario;
          echo '<a href="./user-management">Voltar a gerenciar usuários</a>';
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
