<!DOCTYPE html>
<html>
<head>

<title>MeuDia - Login </title>
<?php include '../import/login.html';?>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name = "google-signin-client_id" content = "279705500392-hanis720lsttntdsq915u5j6cla5urm9.apps.googleusercontent.com">

</head>

<body>

<!-- Img fundo -->
<div id="fullscreen_bg" class="fullscreen_bg"/>

<!-- Alert Bootstrap Erro login -->
<?php include '../php/erroLogin.php';?>

<div class="container">

  <form class="form-signin border shadow p-3 mb-5 bg-white rounded" method="POST" action="../php/verificaLogin.php">

    <!-- LOGO -->
    <h1 class="form-signin-heading text-muted"><img src="../css/img/logo-meudia-login.png" style="height: 150px"></h1>
    <!-- USUARIO -->
    <input type="text" class="form-control username" placeholder="Username" required="" autofocus="" name="username" id="username">
    <!-- SENHA -->
    <input type="password" class="form-control password" placeholder="Password" required="" name="password" id="password">
    <!-- LOGAR -->
    <button class="btn btn-lg btn-primary btn-block" style="background: #5AA0CC;" type="submit">Logar</button>
	 <!-- NOVA CONTA -->
    <center style="margin: 10px;"><a style="color: #5AA0CC;" href="registrar.php">Criar nova conta</a></center>
   <!-- RECUPERAR SENHA -->
   <center><a style="color: #5AA0CC;" href="recuperarSenha.php">Recuperar senha</a></center>
  </form>
  
  

</div>


</div>
<p id="msg"> </p>
<script type="text/javascript">
    

    function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  var userId = profile.getId(); // Do not send to your backend! Use an ID token instead.
  var userName = profile.getName();
  console.log('Image URL: ' + profile.getImageUrl());
  var userEmail = profile.getEmail(); // This is null if the 'email' scope is not present.
  var userToken = googleUser.getAuthResponse().id_token;

    if (userName !== '') {

        var dados = {
            userId:userId,
            userName:userName,
            userEmail:userEmail


        };

        $.post('../php/loginGoogle.php', dados, function(retorna){

            window.location.href = retorna;

        });


    }

}
</script>
</body>
</html>
