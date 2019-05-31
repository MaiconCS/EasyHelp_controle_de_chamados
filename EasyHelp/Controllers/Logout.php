<?php
class Logout extends Controller
{

  public function checkLogout()
  {
    //verifica usuario conectado


    session_start();
    session_destroy();

    echo "<strong>FUI logout</strong>";
    sleep(5);
    header("Location: ./login");
    exit;
  }

}
?>
