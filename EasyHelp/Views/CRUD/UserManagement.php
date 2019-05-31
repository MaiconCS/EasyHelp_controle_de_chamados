<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="http://www.w3ii.com/lib/w3.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">

    <title>Gerenciar Usuários</title>
    <!--<link rel="stylesheet" type="text/css" href="/H/css/style.css" />-->
  </head>
  <div id="logopg1"><img src="img/logomao2.png"></div>
  <body>
  <header class="w3-container w3-light-gray w3-padding-12">
    <center>
     <fieldset>
        <legend><h4><b>LISTA DE USUÁRIOS</h4></b></legend>
       <div class="user_list">
         <p><a href="./user-create"><button type="button" name="adicionar" class="w3-button w3-light-green">Adicionar Usuário</button></a>
         <a href="./home"><button type="button" name="logout" class="w3-button w3-light-blue">Voltar a Home</button></a>
          <a href="./user-management"><button type="button" name="logout"  class="w3-button w3-light-green">Listar TODOS</button></a>
         </p>
         <div class="w3-container w3-responsive">
         <form class="" action="./user-management" method="post">        
         <table class="w3-table w3-striped w3-bordered w3-card-4" cellpadding="0" cellspacing="10">
           <thead class="w3-blue">
             <th>QTD</th>
             <th>ID Usuário:<br><input class="w3-input w3-border w3-hover-blue" type="number" name="id_usr" value=" " style="width:100%;font-size: 13px"></th>
             <th>Nome:<br><input class="w3-input w3-border w3-hover-blue" type="text" name="nome_usr" value="Consultar" style="width:100%;font-size: 13px"></th>
             <th>Login:<br><input class="w3-input w3-border w3-hover-blue" type="text" name="login" value="Consultar" style="width:100%;font-size: 13px"></th>
             <th>Tipo de Usuário:<br><input class="w3-input w3-border w3-hover-blue" type="text" name="tipo_acesso" value="Consultar" style="width:100%;font-size: 13px"></th>
             <th>Setor:<br><input class="w3-input w3-border w3-hover-blue" type="text" name="setor_usr" value="Consultar" style="width:100%;font-size: 13px"></th>
             <th>Local:<br><input class="w3-input w3-border w3-hover-blue" type="text" name="local_usr" value="Consultar" style="width:100%;font-size: 13px"></th>
             <th>Adicionado em:</th>
             <th>Atualizado em:</th>
             <th><a href="./call-management"><button type="submit"  class="w3-button w3-light-green">Pesquisar</button></a></th>
         </thead>
         <tbody>
