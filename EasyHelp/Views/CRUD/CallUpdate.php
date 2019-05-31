<?php
require_once './Controllers/CallUpdate.php';
require_once './Controllers/Controller.php';
$data=self::loadCallUpdate();
$equipments=self::listEquipment();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Editar Chamados</title>
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="http://www.w3ii.com/lib/w3.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
  </head>
  <div id="logopg1"><img src="img/logomao2.png"></div>
  <body>
    <div class="w3-container w3-responsive">
    <fieldset>
      <legend>EDITAR CHAMADOS</legend> <br>
      <a href="./home"><button type="button" name="logout"  class="w3-button w3-light-blue">Voltar a Home</button></a>
      <p>Todos os campos são obrigatórios</p>

      <form autocomplete="off" class="form"  action="./call-update" method="post" class="w3-container">
        <tr>
            <th>Prioridade:</th>
            <td><select type="text" name="prioridade" required="true" class="w3-select">
              <option value="<?= $data['prioridade']?>"><?= $data['prioridade']?></option>
              <option value="URGENTE">Urgente</option>
              <option value="ALTA">Alta</option>
              <option value="BAIXA">Baixa</option>
            </select></td>
          </p>
          <p>
            <th>Descrição: </th>
            <br>
            <td><textarea rows="4" cols="50" type="text" name="descricao" required="true"><?= $data['descricao']?></textarea></td>
          </p>
          <p>
            <th>Categoria:</th>
            <td><select type="text" name="categoria" required="true" class="w3-select">
              <option value="<?= $data['categoria']?>"><?= $data['categoria']?></option>
              <option value="HARDWARE">Hardware</option>
              <option value="SOFTWARE">Software</option>
              <option value="PERIFERICO">Periférico</option>
              <option value="OUTROS">Outros</option>
            </select></td>
          </p>
          <p>
            <th>Equipamento:</th>
            <td><select name="equipamento" required="true" class="w3-select">
              <option><!--primeira opcao vazia--></option>
            <?php foreach ($equipments as $list) { ?>
              <option value="<?= $list->pk_id_equipamento ?>"><?= $list->nome_equipamento ?></option>
            <?php } ?>
            </select></td>
          </p>

          <?php if(self::$VerifyUserConnect == 1 || self::$VerifyUserConnect == 2) { ?>

                  <p>
                  <th>Status:</th>
                  <td><select type="text" name="status" required="true" class="w3-select">
                    <option value="<?= $data['status']?>"><?= $data['status']?></option>
                    <option value="ABERTO">Aberto</option>
                    <option value="PROCESSANDO">Processando</option>
                    <option value="CONCLUIDO">Concluido</option>
                    <option value="FINALIZADO">Finalizado</option>
                  </select></td>
                  </p>

            <?php }else { ?>
              <input type="hidden" name="status" require="true" value="<?= $data['status']?>"></td>
            <?php }?>

         <!--campo oculto-->
         <input type="hidden" name="id_chamado" require="true" value="<?= $data['pk_id_chamado']?>">

         <?php $date = getdate();
            $datahora_updt=''.$date['year'].'-'.$date['mon'].'-'.$date['mday'].'
            '.$date['hours'].':'.$date['minutes'].':'.$date['seconds'].'';
         ?>
         <input type="hidden" name="datahora_updt" require="true" value="<?= $datahora_updt ?>"></td>

         <td><button type="submit" name="adicionar" class="w3-button w3-light-green">Editar chamado</button></td>

         <td><a href="./call-management"><button type="button" name="cancelar" class="w3-button w3-red">Cancelar</button></a></td>

          <!--Controller CallUpdate-->
