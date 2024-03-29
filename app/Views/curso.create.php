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
    <div class="py-1 text-center">
        <img class="d-block mx-auto mb-4" src="app\Views\img\icone_certifico_site.png" alt="" width="72" height="72">
        <h2>Cadastro de Curso/Palestra</h2>
    </div>

    <div class="row">
        <div class="col-md-12 order-md-1">
            <form class="needs-validation" action="/save_curso" method="POST" novalidate>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="ministrante">Ministrante</label>
                        <input type="text" class="form-control" id="ministrante" name="ministrante" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label for="ch">Carga Horária</label>
                        <input type="text" class="form-control" id="ch" name="ch">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="ch_min">C.H. Mínima</label>
                        <input type="text" class="form-control" id="ch_min" name="ch_min" placeholder="">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="turno">Turno</label>
                        <select class="custom-select d-block w-100" id="turno" name="turno" required>
                            <option value="">Escolha...</option>
                            <option>Manhã</option>
                            <option>Tarde</option>
                            <option>Noite</option>
                        </select>
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="inicio">Data de Início</label>
                        <input type="text" class="form-control" id="inicio" name="inicio" placeholder="01/01/2019" maxlength="10" onkeypress="formatar('##/##/####', this);">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="fim">Data de Fim</label>
                        <input type="text" class="form-control" id="fim" name="fim" placeholder="01/01/2019" maxlength="10" onkeypress="formatar('##/##/####', this);">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="layout">Evento</label>
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

                <button class="btn btn-primary btn-lg btn-block" type="submit" name="curso">Confirmar Cadastro</button>
                <br>
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
