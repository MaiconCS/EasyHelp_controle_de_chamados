  <?php

class Home extends Controller
{

  function checkHome()
  {

    //Define os acessos de cada usuario>>  PRIVILÉGIOS
    if($_SESSION['tipo_acesso']==1){
      echo   '<div id="miolo">
      <div id="buser"> <a href="./user-management"> <img src="img/usuario.png"></a></div>';


    }
    echo '

          <div id="bchamado2"> <a href="./call-create"> <img src="img/ABRIRCHAMADO.png"></a></div>
          <div id="bchamado"> <a href="./call-management"> <img src="img/chamado.png"></a></div>
          <div id="bgchamado"> <a href="./sector-management"> <img src="img/SETOR.png"></a></div>
          <div id="busuario"> <a href="./equipment-management"><img src="img/EQUIPAMENTO.png"></a></div>

      </div>




      </body>
    </html>';
  }
}
?>
