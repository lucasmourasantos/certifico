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
 ?>
    <div class="py-1 text-center">
        <img class="d-block mx-auto mb-4" src="app\Views\img\icone_certifico_site.png" alt="" width="72" height="72">
        <h2>Cadastro de Participantes</h2>
        <p class="lead">Pré-cadastro de participantes online.</p>
    </div>

    <div class="row">
        <div class="col-md-12 order-md-1">
            <h4 class="mb-3">Dados Pessoais</h4>
            <form class="needs-validation" action="/save_participante" method="POST" novalidate>
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label for="nome">Nome Completo</label>
                        <input type="text" class="form-control" id="firstName" name="nome" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="sexo">Sexo</label>
                        <select class="custom-select d-block w-100" id="sexo" name="sexo" required>
                            <option value="">Escolha...</option>
                            <option>Feminino</option>
                            <option>Masculino</option>
                            <option>Outro</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="rg">RG</label>
                        <input type="text" class="form-control" id="rg" name="rg">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" maxlength="14" onkeypress="formatar('###.###.###-##', this);">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="dtNasc">Data de Nascimento</label>
                        <input type="text" class="form-control" id="dtNasc" name="data_nasc" placeholder="04/02/2019" maxlength="10" onkeypress="formatar('##/##/####', this);">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="contato">CEP </label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cep" name="cep" value="" maxlength="9" placeholder=""
                                   onblur="pesquisacep(this.value);" />
                            <div class="invalid-feedback" style="width: 100%;">
                                Entre com um contato válido.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 mb-3">
                        <label for="address">Rua</label>
                        <input type="text" class="form-control" id="rua" name="rua" placeholder="" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7 mb-3">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="" >
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="" >
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div>
                    <div class="col-md-1 mb-3">
                        <label for="cidade">Estado</label>
                        <input type="text" class="form-control" id="uf" name="uf" placeholder="" >
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div>
                </div>

                <hr class="mb-4">

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="contato">Contato (Celular) <span class="text-muted">(Optional)</span></label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="fone" name="fone" placeholder="89988102020">
                            <div class="invalid-feedback" style="width: 100%;">
                                Entre com um contato válido.
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="save">Confirmar pré-cadastro</button>
            </form>
            <br>
        </div>
    </div>
<?php include_once('parts/footer.php'); ?>

<?php
} else {
      header("location: /");
      exit;
}
 ?><!-- Caso sessão esteja vazia -->
