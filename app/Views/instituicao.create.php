<?php
//login_success.php
session_start();
if (isset($_SESSION["usuario"])) {
?>

<?php include_once('parts/header-adm.php'); ?>
<?php
  if(isset($_SESSION["success"])):
    echo "<div class='alert alert-success' role='alert'>Cadastrado com sucesso!</div>";
    unset($_SESSION["success"]);
  endif;
  if(isset($_SESSION["error"])):
    echo "<div class='alert alert-danger' role='alert'>Erro ao cadastrar!</div>";
    unset($_SESSION["error"]);
  endif;
  if(isset($_SESSION["msg"])):
    echo "<div class='alert alert-warning' role='alert'>Preencha todos os campos!</div>";
    unset($_SESSION["msg"]);
  endif;
 ?>
    <div class="py-1 text-center">
        <img class="d-block mx-auto mb-4" src="app\Views\img\icone_certifico_site.png" alt="" width="72" height="72">
        <h2>Cadastro de Instituição.</h2>
    </div>

    <div class="row">
        <div class="col-md-12 order-md-1">
            <form class="needs-validation" action="/save_instituicao" method="POST" novalidate>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="nome">Nome </label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                </div>
                <br>
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="instituicao">Confirmar</button>
            </form>
        </div>
    </div>
<?php include_once('parts/footer.php'); ?>

<?php
} else {
      header("location: /");
      exit;
}
 ?><!-- Caso sessão esteja vazia -->
