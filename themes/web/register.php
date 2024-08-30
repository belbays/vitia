<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="themes/web/assetsLogin/styles.css" media="screen" />
    <script type="text/javascript" src="themes/web/assetsLogin/js/scripts.js"></script>
    <meta charset="utf-8">
  </head>
  <body>
    <header> 

    </header>
  <section class="area-login">
    <div class="div-log">
        <div class="logo">
            <img src="themes/web/assetsLogin/images/logoV.png">
        </div>
        <form method="POST">
            <input type="text" name="name" placeholder="Nome" autofocus></input>
            <input type="email"  name="email" placeholder="E-mail" autofocus></input>
            <input type="password"  name="password" placeholder="Senha" autofocus></input>
                <input type="submit"  value="Entrar"></input>
        </form>
        <p>Já tem sua conta?  <a href="<?= url("login"); ?>">Logue</a></p> 
    </div>
  </section>

  </body>
</html>