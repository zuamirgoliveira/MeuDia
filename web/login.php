<!DOCTYPE html>
<html>
<head>

<title>MeuDia - Login </title>
<?php include '../import/login.html';?>

</head>

<body>

<!-- Img fundo -->
<div id="fullscreen_bg" class="fullscreen_bg"/>

<!-- Alert Bootstrap Erro login -->
<?php include '../php/erroLogin.php';?>

<div class="container">

  <form class="form-signin" method="POST" action="../php/verificaLogin.php">

    <!-- LOGO -->
    <h1 class="form-signin-heading text-muted"><img src="../css/img/MeuDiaLogo.png"></h1>
    <!-- USUARIO -->
    <input type="text" class="form-control" placeholder="Login" required="" autofocus="" name="username" id="username">
    <!-- SENHA -->
    <input type="password" class="form-control" placeholder="Password" required="" name="password" id="password">
    <!-- LOGAR -->
    <button class="btn btn-lg btn-primary btn-block" type="submit">let's go!</button>
    <center><a href="registrar.php">Criar nova conta</a></center>
  </form>

</div>


<div class="container">
 <div></div>   

</div>

</body>
</html>