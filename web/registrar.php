<!DOCTYPE html>
<html>
<head>

<title>MeuDia - Registrar </title>

<?php include '../import/login.html';?>

</head>

<body>

<!-- Img fundo -->
<div id="fullscreen_bg" class="fullscreen_bg"/>
<div class='alert alert-info alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
     Algumas informações são registradas após<strong> Logado</strong>!
  </div>    
<?php include '../php/erroRegistro.php';?>

<div class="container">

  <form class="form-signin" method="POST" action="../php/verificaRegistro.php">

    <!-- LOGO -->
    <h1 class="form-signin-heading text-muted"><img src="../css/img/MeuDiaLogo.png"></h1>
    <!-- USUARIO -->
    <input type="text" class="form-control" placeholder="Login" required="" autofocus="" name="username" id="username">
    <!-- SENHA -->
    <input type="password" class="form-control" placeholder="Senha" required="" name="password" id="password">

    <!-- Nome e sobrenome -->
    <input type="" class="form-control" placeholder="Nome e Sobrenome" required="" name="nome" id="nome">
    
    
    <!-- LOGAR -->
    <button class="btn btn-lg btn-primary btn-block" type="submit" style="top:200">Cadastre-se</button>
    <center><a href="login.php">Voltar para o Login</a></center>
  </form>

</div>


<div class="container">
 <div></div>   

</div>

</body>
</html>