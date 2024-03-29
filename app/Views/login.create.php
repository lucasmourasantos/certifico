<?php include_once('parts/header-adm-login.php'); ?>
<form class="form-signin" method="POST" action="/login">
    <div class="py-1 text-center">
        <img class="mb-4" src="app\Views\img\Logo Certifico Resumida.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>

    <?php
    if (isset($message)) {
        echo '<label class="text-danger">' . $message . '</label>';
    }
    ?>

    <label for="inputNome" class="sr-only">Nome</label>
    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Nome de usuário" required autofocus>

    <label for="inputPassword" class="sr-only">Senha</label>
    <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required>

    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Me lembre
        </label>
    </div>

    <input class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Logar">
    <!--<button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>-->

    <p class="mt-3 mb-1">Não é membro? <a href="login-novo">Cadastre-se </a> </p>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </div>
</form>
<?php include_once('parts/footer.php'); ?>
