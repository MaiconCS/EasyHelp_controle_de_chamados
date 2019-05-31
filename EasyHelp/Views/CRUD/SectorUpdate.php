<?php
require_once './Controllers/SectorUpdate.php';
$data=self::loadSectorUpdate();
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="http://www.w3ii.com/lib/w3.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">

    <title>Editar Setor</title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
  </head>
  <div id="logopg1"><img src="img/logomao2.png"></div>
  <body>
    <fieldset>
      <legend>Editar Setor</legend> <br>
      <a href="./home"><button type="button" name="logout" class="w3-button w3-light-blue">Voltar a Home</button></a>
      <p>Todos os campos são obrigatórios</p>

      <form autocomplete="off" class="form"  action="./sector-update" method="post">
        <tr>
          <p>
            <th>Nome: </th>
            <td><input class="w3-input w3-border w3-hover-blue" type="text" name="nome_setor" required="true" placeholder="*" value="<?= $data['nome_setor']?>"></td>
          </p>
          <p>
            <th>Local: </th>
            <td><input class="w3-input w3-border w3-hover-blue" type="text" name="local" required="true" placeholder="*" value="<?= $data['local']?>"></td>
          </p>
          <p>
            <th>Ramal: </th>
            <td><input class="w3-input w3-border w3-hover-blue" type="number" name="ramal" required="true" placeholder="*" value="<?= $data['ramal']?>"></td>
          </p>
           <!--campo oculto-->
          <input type="hidden" name="id_setor" require="true" value="<?=$data['pk_id_setor']?>">

          <?php $date = getdate();
             $datahora_updt=''.$date['year'].'-'.$date['mon'].'-'.$date['mday'].'
             '.$date['hours'].':'.$date['minutes'].':'.$date['seconds'].'';
          ?>
          <input type="hidden" name="datahora_updt" require="true" value="<?= $datahora_updt ?>"></td>
          <td><button type="submit" name="adicionar" class="w3-button w3-light-green">Editar Setor</button></td>

          <td><a href="./sector-management"><button type="button" name="cancelar" class="w3-button w3-red">Cancelar</button></a></td>

          <!--Controller SectorUpdate-->
