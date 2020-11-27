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
        <!-- LOGIN GOOGLE -->
        <center><div class="g-signin2" data-onsuccess="onSignIn" style="margin-top: 10px; width: 250px; "></div></center>
        <!-- NOVA CONTA -->
        <div style="margin: 20px 0 0 0; text-align: center;"><a style="color: #5AA0CC; font-size: 12px;" href="registrar.php">Cadastre-se</a></div>
        <!-- RECUPERAR SENHA -->
        <div style="text-align: center;"><a style="color: #5AA0CC; font-size: 12px;" href="recuperarSenha.php">Recuperar senha</a></div>
    </form>
</div>


</div>
<p id="msg"> </p>
<script type="text/javascript">
    

    function onSignIn(googleUser) {
        let profile = googleUser.getBasicProfile();
        let userId = profile.getId(); // Do not send to your backend! Use an ID token instead.
        let userName = profile.getName();
        let userImagem = profile.getImageUrl();
        let userEmail = profile.getEmail(); // This is null if the 'email' scope is not present.
        let userToken = googleUser.getAuthResponse().id_token;

            if (userName !== '') {
                let dados = {
                    userId,
                    userName,
                    userEmail,
                    userImagem
                };
                console.log(dados);
                $.post('../php/loginGoogle.php', dados, function(retorna){
                    window.location.href = retorna;
                });
            }
    }
</script>
</body>
</html>
