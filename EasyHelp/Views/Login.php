<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Easy Help</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="http://www.w3ii.com/lib/w3.css">

    </head>
    <body>
        <div class="tamanha">
        <div id="teste">
        <center>
        <fieldset>
          <form method="post" action="./login"/>
          <img src="img/logo.png">
            <label>
                <span>Login</span>
                <input type="login" name="login" id="login" required="true" placeholder="Digite seu Login">
            </label>
            <label>
                <span>Senha</span>
                <input pattern=".{6,}" type="password"
                title="Satisfaça o formato solicitado comS no minímo 6 caracteres"
                name="senha" id="senha" required="true" placeholder="Digite sua senha" />
            </label>
            <label>

              <a> <button type="submit" value="Entrar"/>Entrar</button></a>
            </label>
            </form>
        </fieldset>
      </center>
        </div>
        </div>
    </body>

</html>
