<?php
//login_success.php
//session_start();
if (isset($_SESSION["usuario"])) {
?>

<?php include_once('parts/header.php'); ?>
    <div class="py-1">
        <img class="d-block mx-auto mb-4" src="app\Views\img\icone_certifico_site.png" alt="" width="72" height="72">
        <h2>Validação de certificado online</h2>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12 order-md-1">
            <form class="form-horizontal" action="/verificar_cert_users" method="post"  id="contact_form">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="codigo">Código de Verificação no certificado</label>
                        <input type="text" class="search-query form-control" id="codigo" name="codigo">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="emitir">Verificar Autenticidade</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-12 order-md-1">
              <?php if (count($users) > 0): ?>
                  <?php foreach ($users as $user): ?>
                    <div class="resultadoForm">
                        <input type="hidden" name="participante_id" id="txtstart"/>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>CPF</td>
                                    <td>Nome</td>
                                    <td>Curso</td>
                                    <td></td>
                                </tr>
                            </thead>

                                  <tbody>
                                    <tr>
                                        <td><?php echo $user['cpf']; ?></td>
                                        <td><?php echo $user['nome']; ?></td>
                                        <td><?php echo $user['curso']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                  <?php endif; ?>
            </div>
        </div>
    </div>
<?php include_once('parts/footer.php'); ?>

<?php
} else {
      header("location: /");
      exit;
}
 ?><!-- Caso sessão esteja vazia -->
