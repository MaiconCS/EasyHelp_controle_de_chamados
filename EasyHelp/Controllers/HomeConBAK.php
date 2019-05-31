<?php

class Home extends Controller
{

  function checkHome()
  {

    echo self::$VerifyUserConnect;

    //Define os acessos de cada usuario>>  PRIVILÉGIOS
    if($_SESSION['type_access'] == "SOLICITANTE"){
      echo '<a href="./call-create"><button type="button" name="manager">Abrir Chamados</button></a>';
    }elseif ($_SESSION['type_access'] == "TECNICO") {
      echo '';// somente DIV DO TECNICO.
    }

    echo '<a href="./call-management"><button type="button" name="manager">Gerenciar chamados</button></a>';
    echo '<a href="./sector-management"><button type="button" name="manager">Gerenciar Setores</button></a>';
    echo '<a href="./equipment-management"><button type="button" name="manager">Gerenciar Equipamentos</button></a>';

    if($_SESSION['type_access'] == "ADMINISTRADOR"){
      echo '<a href="./user-management"><button type="button" name="manager">Gerenciar Usuários</button></a>';
      echo '<a href="./dashboard"><button type="button" name="manager">Dashboard</button></a>';

    }
    echo '
      </body>
    </html>';
  }
}
?>
