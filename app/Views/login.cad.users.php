<?php include_once('parts/header-adm-login.php'); ?>
<?php
if(isset($_SESSION["success"])):
  print $_SESSION["success"];
  unset($_SESSION["success"]);
endif;
if(isset($_SESSION["error"])):
  print $_SESSION["error"];
  unset($_SESSION["error"]);
endif;
?>
<form class="form-signin" method="post" action="/save_cad_login_users">

    <div class="py-1 text-center">
        <img class="mb-4" src="app\Views\img\Logo Certifico Resumida.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Cadastro</h1>

    <label for="inputNome" class="sr-only">Nome</label>
    <input type="text" id="inputNome" name="username" class="form-control" placeholder="Nome de usuário" required autofocus>

    <label for="inputEmail" class="sr-only">Email</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required>

    <label for="inputPassword" class="sr-only">Senha</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Senha" name="password_1" required>

    <label for="inputPassword" class="sr-only">Confirmar a senha</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Repetir a senha" name="password_2" required>

    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Me lembre
        </label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Cadastrar</button>

      <p class="mt-3 mb-1">Já é membro? <a href="/adm-login">Fazer login <a/></p>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </div>
</form>
<?php include_once('parts/footer.php'); ?>
