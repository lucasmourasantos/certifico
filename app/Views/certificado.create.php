<?php
//login_success.php
//session_start();
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
 ?>
    <div class="py-1">
        <img class="d-block mx-auto mb-4" src="app\Views\img\icone_certifico_site.png" alt="" width="72" height="72">
        <h2>Cadastro de Certificados</h2>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12 order-md-1">
            <form class="needs-validation" action="/save_certificado" method="POST" enctype="multipart/form-data" novalidate>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="input-default-wrapper mt-3">
                            <label for="file">Layout do Certificado</label><br/>
                            <input type="file" name="layout" id="file-with-current" class="input-default-js">
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="input-default-wrapper mt-3">
                            <label for="file">Assinatura Eletrônica</label><br/>
                            <input type="file" name="ass" id="file-with-current" class="input-default-js">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="evento">Evento</label>
                        <select class="custom-select d-block w-100" id="layout" name="id_evento" required>
                          <option value="">Escolha...</option>

                          <?php if (count($users) > 0): ?>
                            <?php foreach ($users as $user): ?>

                              <option value="<?php echo $user['id']; ?>"><?php echo Utf8_encode($user['nome']); ?></option>

                            <?php endforeach; ?>

                          <?php else: ?>
                          Nenhum usuário cadastrado
                          <?php endif; ?>
                      </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                </div>

                <hr class="mb-4">

                <button class="btn btn-primary btn-lg btn-block" type="submit" name="certificado">Confirmar Cadastro</button>
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
