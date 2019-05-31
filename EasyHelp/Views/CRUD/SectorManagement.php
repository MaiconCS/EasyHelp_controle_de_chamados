<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="http://www.w3ii.com/lib/w3.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">

    <title>Gerenciar Setores</title>
    <!--<link rel="stylesheet" type="text/css" href="/H/css/style.css" />-->
  </head>
  <div id="logopg1"><img src="img/logomao2.png"></div>
  <body>
    <header class="w3-container w3-light-gray w3-padding-12">
    <center>
     <fieldset>
       <legend><h4><b>LISTA DE SETORES</h4></b></legend>
       <div class="user_list">
         <?php if(self::$VerifyUserConnect == 1) { ?>
          <p id="Sector" ><a href="./sector-create"><button type="button" name="adicionar" class="w3-button w3-light-green">Adicionar Setor</button></a>
          <?php  }  ?>
         <a href="./home"><button type="button" name="logout" class="w3-button w3-light-blue">Voltar a Home</button></a>
          <a href="./sector-management"><button type="button" name="logout" class="w3-button w3-light-green">Listar TODOS</button></a>
         </p>
         <form class="" action="./sector-management" method="post">
         <div class="w3-container w3-responsive">
         <table class="w3-table w3-striped w3-bordered w3-card-4" cellpadding="0" cellspacing="10">
           <thead class="w3-blue">
             <th>QTD</th>
             <th>Nome:<br><input class="w3-input w3-border w3-hover-blue" type="text" name="nome_str" value="Consultar" style="width:100%;font-size: 13px"></th>
             <th>Local:<br><input class="w3-input w3-border w3-hover-blue" type="text" name="local" value="Consultar" style="width:100%;font-size: 13px"></th>
             <th>Ramal:<br><input class="w3-input w3-border w3-hover-blue" type="text" name="ramal" value="Consultar" style="width:100%;font-size: 13px"></th>
             <th>Adicionado em:</th>
             <th>Atualizado em:</th>
             <th><a href="./sector-management"><button type="submit" class="w3-button w3-light-green">Pesquisar</button></a></th>
         </thead>
         <tbody>
