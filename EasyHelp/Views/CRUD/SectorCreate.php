<!DOCTYPE html>
<html>
  <head>
      <link rel="stylesheet" type="text/css" href="/css/estilo.css">
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="http://www.w3ii.com/lib/w3.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">

    <title>Adicionar Setor</title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
  </head>
  <div id="logopg1"><img src="img/logomao2.png"></div>
  <body>
    <header class="w3-container w3-light-gray w3-padding-12">
    <fieldset>
      <legend>Adicionar Setor</legend> <br>
      <a href="./home"><button type="button" name="logout" class="w3-button w3-light-blue">Voltar a Home</button></a>
      <p>Todos os campos são obrigatorios</p>

      <form autocomplete="off" class="form"  action="./sector-create" method="post">
        <tr>
          <p>
            <th>Nome: </th>
            <td><input type="text" name="nome_setor" required="true" placeholder="*"></td>
          </p>
          <p>
            <th>Local: </th>
            <td><input class="w3-input w3-border w3-hover-blue" type="text" name="local" required="true" placeholder="*"></td>
          </p>
          <p>
            <th>Ramal: </th>
            <td><input class="w3-input w3-border w3-hover-blue" type="number" name="ramal" required="true" placeholder="*"></td>
          </p>
          <?php $datatime = getdate();
             $datahora_bd=''.$datatime['year'].'-'.$datatime['mon'].'-'.$datatime['mday'].'
             '.$datatime['hours'].':'.$datatime['minutes'].':'.$datatime['seconds'].'';
          ?>
          <input type="hidden" name="datahora" require="true" value="<?= $datahora_bd ?>"></td>

          <td><button type="submit" name="adicionar" class="w3-button w3-light-green">Salvar Setor</td>

          <td><a href="./sector-management"><button type="button" name="cancelar" class="w3-button w3-red">Cancelar</button></a></td>
