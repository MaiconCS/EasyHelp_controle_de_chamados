<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="http://www.w3ii.com/lib/w3.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">

    <title>Gerenciar Equipamentos</title>
    <!--<link rel="stylesheet" type="text/css" href="/H/css/style.css" />-->
  </head>
  <body>

    <header class="w3-container w3-light-gray w3-padding-12">
    <div id="logopg1"><img src="./img/logomao2.png"></div>
    <center>
     <fieldset>
       <legend><h4><b>LISTA DE EQUIPAMENTOS</h4></b></legend>
       <div class="user_list">
         <?php if(self::$VerifyUserConnect == 1) { ?>
         <p><a href="./equipment-create"><button type="button" name="adicionar" class="w3-button w3-light-green">Adicionar Equipamento</button></a>
         <?php } ?>
         <a href="./home"><button type="button" name="logout" class="w3-button w3-light-blue">Voltar a Home</button></a>
          <a href="./equipment-management"><button type="button" name="logout" class="w3-button w3-light-green">Listar TODOS</button></a>
         </p>
         <form class="" action="./equipment-management" method="post">
         <table class="w3-table w3-striped w3-bordered w3-card-4" cellpadding="0" cellspacing="10">
           <thead class="w3-blue">
             <th>QTD</th>
             <th>ID Equip:<br><input class="w3-input w3-border w3-hover-blue" type="number" name="id_equip" value=" " style="width:100%;font-size: 13px"></th>
             <th>Nome:<br><input class="w3-input w3-border w3-hover-blue" type="text" name="nome_equip" value="Consultar" style="width:100%;font-size: 13px"></th>
             <th>Modelo:<br><input class="w3-input w3-border w3-hover-blue" type="text" name="modelo" value="Consultar" style="width:100%;font-size: 13px"></th>
             <th>Setor:<br><input class="w3-input w3-border w3-hover-blue" type="text" name="setor" value="Consultar" style="width:100%;font-size: 13px"></th>
             <th>Local:<br><input class="w3-input w3-border w3-hover-blue" type="text" name="local" value="Consultar" style="width:100%;font-size: 13px"></th>
             <th>Adicionado em:</th>
             <th>Atualizado em:</th>
             <th><a href="./call-management"><button type="submit" class="w3-button w3-light-green">Pesquisar</button></a></th>
           </thead>
           <tbody>
            <!--Controller EquipmentManagement-->
