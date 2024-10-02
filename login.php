<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="img/icon.png" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Home</title>
</head>

<body>
  <main>
    <h1>BD_Autoria</h1>
    <h2>Login</h2>
    <form name="formProduto" method="POST" action="">
      <div class="linha">
        <p>Usuario:</p>
        <input name="txtusuario" type="text" maxlength="50" placeholder="Usuario..." required autocomplete="off">
      </div>
      <div class="linha">
        <p>Senha:</p>
        <input name="txtsenha" id="senha" type="password" maxlength="11" placeholder="Senha..." required
          autocomplete="off">
      </div>
      <div class="linha"><button name="enviar" type="submit">Logar</button>
      </div>
    </form>
    <?php
    extract($_POST, EXTR_OVERWRITE);
    if (isset($enviar)) {
      include_once 'usuario.php';
      $usuario = new Usuario();
      $usuario->setUsuario($txtusuario);
      $usuario->setSenha($txtsenha);
      $usuario_bd = $usuario->logar();

      $existe = false;
      foreach ($usuario_bd as $usuario_mostrar) {
        $existe = true;
        ?>
        <?php echo "Bem vindo $usuario_mostrar[1]";
        ?>
        <button class="button-cor" onclick="location.href='menu.html'">Entrar</button>
        <?php
      }
      if ($existe == false) {
        header("location:logininvalido.php");
      }
    }
    ?>
  </main>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script>
  $("#senha").mask("00000000000");
</script>

</html>