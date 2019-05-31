<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gerenciar Chamados</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="http://www.w3ii.com/lib/w3.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
  </head>
  <body>
    <div id="logopg1"><img src="./img/logomao2.png"></div>

    <center>
     <fieldset>
        <legend><h4><B>LISTA DE CHAMADOS</h4></B></legend>
       <div class="user_list">
         <p>
           <a href="./call-create"><button type="button" name="adicionar" class="w3-button w3-light-green" >Adicionar Chamado</button></a>
           <a href="./home"><button type="button" name="logout" class="w3-button w3-light-blue">Voltar a Home</button></a>
           <a href="./call-management"><button type="button" name="logout" class="w3-button w3-light-green">Listar TODOS</button></a>
         </p>
         <form class="" action="./call-management" method="post">
         <div class="w3-container w3-responsive">
         <table cellpadding="0" cellspacing="10" class="w3-table w3-striped w3-bordered w3-card-4">
           <thead class="w3-blue"V>
             <th>QTD</th>
             <th>N° Chamado:<br><input class="w3-input w3-border w3-hover-blue" type="number" name="id_chamado" value=" " style="width:100%;font-size: 13px"></th>
             <th>ID Req.:<br><input class="w3-input w3-border w3-hover-blue" type="number" name="id_req" value=" " style="width:100%;font-size: 13px"></th>
             <th>Requerente:<br><input class="w3-input w3-border w3-hover-blue"  type="text" name="requerente" value="Consultar" style="width:100%;font-size: 13px"></th>
             <th>Prioridade:<br><input class="w3-input w3-border w3-hover-blue" type="text" name="prioridade" value="Consultar" style="width:100%;font-size: 13px"></th>
             <th>Descrição:<br><input class="w3-input w3-border w3-hover-blue" type="text" name="descricao" value="Consultar" style="width:100%;font-size: 13px"></th>
             <th>Categoria:<br><input class="w3-input w3-border w3-hover-blue" type="text" name="categoria" value="Consultar" style="width:100%;font-size: 13px"></th>
             <th>ID Equip.:<br><input class="w3-input w3-border w3-hover-blue" type="number" name="id_equip" value=" " style="width:100%;font-size: 13px"></th>
             <th>Equipamento:<br><input class="w3-input w3-border w3-hover-blue" type="text" name="nome_equip" value="Consultar" style="width:100%;font-size: 13px"></th>
             <th>Status:<br><input class="w3-input w3-border w3-hover-blue" type="text" name="status" value="Consultar" style="width:100%;font-size: 13px"></th>
             <th>Adicionado em:</th>
             <th>Atualizado em:</th>
             <th><a href="./call-management"><button type="submit" class="w3-button w3-light-green">Pesquisar</button></a></th>
           </thead>
           <tbody>
