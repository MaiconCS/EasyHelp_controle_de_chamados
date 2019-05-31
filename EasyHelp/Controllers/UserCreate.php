<?php
class UserCreate extends Controller{

  function checkUserCreate($nome_usuario, $login, $senha, $id_acesso, $id_setor, $datahora_bd){
    print_r($senha);
    $senha64=self::encript($senha);
    print_r($senha64);
    //verifica tipo de usuario
    if(self::$VerifyUserConnect == 1){
      //checa existencia previa do login
      $CheckExists=self::queryCountReg("SELECT * FROM tbl_usuarios WHERE login='$login'");

      if ($CheckExists==0) {

        //-------------------------------------insert usr------------------------------------------------

        $result=self::queryInsert("INSERT INTO tbl_usuarios SET fk_id_acesso='$id_acesso',
          nome_usuario='$nome_usuario',login='$login',senha='$senha64',
          tbl_usuarios.criado_em= STR_TO_DATE('{$datahora_bd}', '%Y-%m-%d %H:%i:%s'),
          tbl_usuarios.atualizado_em = STR_TO_DATE('{$datahora_bd}', '%Y-%m-%d %H:%i:%s')");

        //---------------------------busca-id-usr-------------------------------------------------------------

        $id_usuario=self::queryVerifyUserId("SELECT pk_id_usuario FROM tbl_usuarios
        WHERE nome_usuario = '$nome_usuario' AND login='$login' AND senha='$senha64' AND
        tbl_usuarios.criado_em = STR_TO_DATE('{$datahora_bd}','%Y-%m-%d %H:%i:%s')");

        //-------------------------insert-reg-usr-------------------------------------------------------------

        $reg_chamado=self::queryInsert("INSERT INTO tbl_reg_usuario_setor
          (fk_id_usuario,fk_id_setor) VALUES ('$id_usuario', '$id_setor')");


        if ($result == "Success" && $reg_chamado == "Success") {
          echo '<br>Usuário cadastrado voltar a ';
          echo '<a href="./user-management"><button type="button">Lista de usuários</button></a>';
        }else {
          echo '<p>FALHA AO ACESSAR O DB</p>';
          echo $result;
          echo '<a href="./user-management">Voltar a gerenciar usuários</a>';
        }
      }else {
        echo "Este Login já está sendo utilizado!";
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
