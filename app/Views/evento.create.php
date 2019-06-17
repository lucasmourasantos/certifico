<?php include("head.php"); ?>
<div class="container">
    <div class="py-1 text-center">
        <img class="d-block mx-auto mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Cadastro de Evento.</h2>
    </div>

    <div class="row">
        <div class="col-md-12 order-md-1">
            <form class="needs-validation" action="/save_evento" method="POST" novalidate>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nome">Nome </label>
                        <input type="text" class="form-control" id="firstName" name="nome" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="instituicao">Instituição/Local </label>
                        <select class="custom-select d-block w-100" id="layout" name="id" required>
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
                <br>
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="evento">Confirmar</button>
            </form>
        </div>
    </div>
<?php include("footer.php"); ?>
