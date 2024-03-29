<?php
//login_success.php
session_start();
if (isset($_SESSION["usuario"])) {
?>

<?php include_once('parts/header.php'); ?>
    <div class="py-1">
        <img class="d-block mx-auto mb-4" src="app\Views\img\icone_certifico_site.png" alt="" width="72" height="72">
        <h2>Gere seu certificado online</h2>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12 order-md-1">
            <form class="form-horizontal" action="/emitir_certificado_users" method="post"  id="contact_form">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="cpf">CPF</label>
                        <input type="text" class="search-query form-control" id="cpf" name="cpf" placeholder="Buscar por CPF" maxlength="14" onkeypress="formatar('###.###.###-##', this);">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="emitir">Gerar Certificado</button>
                    </div>
                    <div class="col-md-4 mb-3">
                    </div>
                </div>
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
