<?php
require_once './Controllers/Controller.php';
$equipments=self::listEquipment();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="http://www.w3ii.com/lib/w3.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <title>Adicionar Chamados</title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
  </head>

  <div id="logopg1"><img src="img/logomao2.png"></div>
  <div class="w3-container w3-responsive">
  <body>
    <fieldset>
      <legend>Adicionar Chamados</legend> <br>
      <a href="./home"><button class="w3-button w3-light-blue">Voltar a Home</button></a>

      <p>Todos os campos são obrigatórios</p>

      <form autocomplete="off" class="form"  action="./call-create" method="post">
        <tr>
          <p>
            <th>Prioridade:</th>
            <td><select class="w3-select" name="prioridade" required="true">
              <option><!--primeira opcao vazia--></option>
              <option value="URGENTE">Urgente</option>
              <option value="ALTA">Alta</option>
              <option value="BAIXA">Baixa</option>
            </select></td>
          </p>
          <p>
            <th>Descrição: </th>
            <br>
            <td><textarea rows="4" cols="50" name="descricao" required="true" placeholder="*"></textarea></td>
          </p>
          <p>
            <th>Categoria:</th>
            <td><select class="w3-select" name="categoria" required="true">
              <option><!--primeira opcao vazia--></option>
              <option value="HARDWARE">Hardware</option>
              <option value="SOFTWARE">Software</option>
              <option value="PERIFERICO">Periférico</option>
              <option value="OUTROS">Outros</option>
            </select></td>
          </p>
          <p>
            <th>Equipamento:</th>
            <td><select class="w3-select" name="equipamento" required="true">
              <option><!--primeira opcao vazia--></option>
            <?php foreach ($equipments as $list) { ?>
              <option value="<?= $list->pk_id_equipamento ?>"><?= $list->nome_equipamento ?></option>
            <?php } ?>
            </select></td>
          </p>
          <p>
           <!--campo STATUS oculto-->
           <input type="hidden" name="status" require="true" value="ABERTO"></td>

           <?php $data = getdate();
              $datahora_bd=''.$data['year'].'-'.$data['mon'].'-'.$data['mday'].'
              '.$data['hours'].':'.$data['minutes'].':'.$data['seconds'].'';
           ?>
           <input type="hidden" name="datahora" require="true" value="<?= $datahora_bd ?>"></td>
         </p>


          <td><button type="submit" name="adicionar" class="w3-button w3-light-green">Salvar Chamado</button></td>

          <td><a href="./call-management"><button type="button" name="cancelar" class="w3-button w3-red">Cancelar</button></a></td>
