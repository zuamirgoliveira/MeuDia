<!DOCTYPE html>
<html>
<head>

<?php include '../import/login.html';?>

</head>

<body>

<!-- Img fundo -->
<div id="fullscreen_bg" class="fullscreen_bg"/>

<div class="container">

  <form class="form-signin border shadow p-3 mb-5 bg-white rounded" method="POST" action="../php/recuperarSenha.php">

    <!-- LOGO -->
    <h1 class="form-signin-heading text-muted"><img src="../css/img/logo-meudia-login.png" style="height: 150px"></h1>
    <!-- E-MAIL -->
    <input type="text" class="form-control email" placeholder="E-mail" required="" autofocus="" name="email" id="email">
    <!-- REGISTRAR NOVA SENHA -->
  <button class="btn btn-lg btn-primary btn-block" style="background: #5AA0CC;" type="submit">Enviar nova senha</button>


  </form>

</div>


</div>


</body>
</html>