<?php
require_once './Controllers/Controller.php';
$sector=self::listSector();
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="http://www.w3ii.com/lib/w3.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <title>Adicionar Equipamento</title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
  </head>
  <div id="logopg1"><img src="img/logomao2.png"></div>
  <body>
    <fieldset>
    <legend><h4><b>ADICIONAR EQUIPAMENTO</h4></b></legend> <br>
      <a href="./home"><button type="button" name="logout" class="w3-button w3-light-blue">Voltar a Home</button></a>
      <p>Todos os campos são obrigatorios</p>

      <form autocomplete="off" class="form" action="./equipment-create" method="post">
        <tr>
          <p>
          <p>
            <th>Nome: </th>
            <td><input class="w3-input w3-border w3-hover-blue" type="text" name="nome_equipamento" required="true" placeholder="*"></td>
          </p>
          <p>
            <th>Modelo: </th>
            <td><input class="w3-input w3-border w3-hover-blue" type="text" name="modelo" required="true" placeholder="*"></td>
          </p>
          <p>
            <th>Setor:</th>
            <td><select class="w3-select" name="setor" required="true">
              <option><!--primeira opcao vazia--></option>
            <?php foreach ($sector as $list) { ?>
              <option value="<?= $list->pk_id_setor ?>"><?= $list->nome_setor ?></option>
            <?php } ?>
            </select></td>
          </p>
          <?php $datatime = getdate();
             $datahora_bd=''.$datatime['year'].'-'.$datatime['mon'].'-'.$datatime['mday'].'
             '.$datatime['hours'].':'.$datatime['minutes'].':'.$datatime['seconds'].'';
          ?>
          <input type="hidden" name="datahora" require="true" value="<?= $datahora_bd ?>"></td>

          <td><button type="submit" name="adicionar" class="w3-button w3-light-green">Salvar Equipamento</td>

          <td><a href="./equipment-management"><button type="button" name="cancelar" class="w3-button w3-red">Cancelar</button></a></td>
