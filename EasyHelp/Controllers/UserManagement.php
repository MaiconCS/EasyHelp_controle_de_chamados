<?php
class UserManagement extends Controller {

  function loadUserManagement(){


    require_once './Views/CRUD/UserManagement.php';

if(self::$VerifyUserConnect == 1){

      $listAll=self::queryListAll("SELECT tbl_usuarios.pk_id_usuario,
        tbl_usuarios.nome_usuario,
     		tbl_usuarios.login,
     		tbl_tipo_acesso.nome_acesso,
     		tbl_setores.nome_setor,
     		tbl_setores.local,
        DATE_FORMAT(tbl_usuarios.criado_em, '%d/%m/%Y %H:%i:%s') as adicionado,
        DATE_FORMAT(tbl_usuarios.atualizado_em, '%d/%m/%Y %H:%i:%s') as atualizado

     FROM tbl_reg_usuario_setor

     JOIN
     tbl_usuarios
     ON tbl_reg_usuario_setor.fk_id_usuario = tbl_usuarios.pk_id_usuario
     JOIN
     tbl_tipo_acesso
     ON tbl_usuarios.fk_id_acesso = tbl_tipo_acesso.pk_id_acesso
     JOIN
     tbl_setores
     ON tbl_reg_usuario_setor.fk_id_setor = tbl_setores.pk_id_setor"


    );


      $listAll = array_reverse($listAll); //reverte arr
      if (!empty($listAll)) {
              $QTD = 1; //contador
              foreach ($listAll as $list) {//continua de <!--tbody-->
                echo '
                  <tr>
                    <td>' .$QTD++. '</td>
                    <td>' .$list->pk_id_usuario.'</td>
                    <td>' .$list->nome_usuario.'</td>
                    <td>' .$list->login.'</td>
                    <td>' .$list->nome_acesso.'</td>
                    <td>' .$list->nome_setor.'</td>
                    <td>' .$list->local.'</td>
                    <td>' .$list->adicionado.'</td>
                    <td>' .$list->atualizado.'</td>
                    <td>
                      <!-- extensão .php removida POR CAUSA DAS ROTAS-->
                      <a href="./user-update?id_usuario='.self::encript($list->pk_id_usuario).'"> EDITAR </a>
                      | <a href="./user-delete?id_usuario='.self::encript($list->pk_id_usuario).'"> EXCLUIR </a>
                    </td>
                  </tr>
                ';
              }//foreach
      }else{
        echo '    <tr><td colspan="5">Não ha objetos no DB</td></tr>';
      }
   echo'          </tbody>
</table>
</form>
</div>
</fieldset>
</center>
</body>
</html> ';
      }//if adm
    }//fun

    function checkUserManagement(){


      require_once './Views/CRUD/UserManagement.php';

  if(self::$VerifyUserConnect == 1){

        $listAll=self::queryListAll("SELECT tbl_usuarios.pk_id_usuario,
          tbl_usuarios.nome_usuario,
          tbl_usuarios.login,
          tbl_tipo_acesso.pk_id_acesso,
          tbl_tipo_acesso.nome_acesso,
          tbl_setores.nome_setor,
          tbl_setores.local,
          DATE_FORMAT(tbl_usuarios.criado_em, '%d/%m/%Y %H:%i:%s') as adicionado,
          DATE_FORMAT(tbl_usuarios.atualizado_em, '%d/%m/%Y %H:%i:%s') as atualizado
       FROM tbl_reg_usuario_setor

       JOIN
       tbl_usuarios
       ON tbl_reg_usuario_setor.fk_id_usuario = tbl_usuarios.pk_id_usuario
       JOIN
       tbl_tipo_acesso
       ON tbl_usuarios.fk_id_acesso = tbl_tipo_acesso.pk_id_acesso
       JOIN
       tbl_setores
       ON tbl_reg_usuario_setor.fk_id_setor = tbl_setores.pk_id_setor

       WHERE  tbl_usuarios.pk_id_usuario LIKE '{$_POST['id_usr']}'
       OR tbl_usuarios.nome_usuario LIKE '{$_POST['nome_usr']}%'
       OR tbl_usuarios.login LIKE '{$_POST['login']}%'
       OR tbl_tipo_acesso.nome_acesso LIKE '{$_POST['tipo_acesso']}%'
       OR tbl_setores.nome_setor LIKE '{$_POST['setor_usr']}%'
       OR tbl_setores.local LIKE '{$_POST['local_usr']}%';

       ");

        $listAll = array_reverse($listAll); //reverte arr
        if (!empty($listAll)) {
                $QTD = 1; //contador
                foreach ($listAll as $list) {//continua de <!--tbody-->
                  echo '
                    <tr>
                      <td>' .$QTD++. '</td>
                      <td>' .$list->pk_id_usuario.'</td>
                      <td>' .$list->nome_usuario.'</td>
                      <td>' .$list->login.'</td>
                      <td>' .$list->nome_acesso.'</td>
                      <td>' .$list->nome_setor.'</td>
                      <td>' .$list->local.'</td>
                      <td>' .$list->adicionado.'</td>
                      <td>' .$list->atualizado.'</td>
                      <td>
                        <!-- extensão .php removida POR CAUSA DAS ROTAS-->
                        <a href="./user-update?id_usuario='.self::encript($list->pk_id_usuario).'">EDITAR </a>
                        |<a href="./user-delete?id_usuario='.self::encript($list->pk_id_usuario).'">EXCLUIR </a>
                      </td>
                    </tr>
                  ';
                }//foreach
        }else{
          echo '    <tr><td colspan="5">Não ha objetos no DB</td></tr>';
        }
     echo'          </tbody>
  </table>
  </form>
  </div>
  </fieldset>
  </center>
  </body>
  </html> ';
        }//if adm
      }//fun


}//class
?>
