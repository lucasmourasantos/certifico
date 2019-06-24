<?php
//login_success.php
session_start();
if (isset($_SESSION["usuario"])) {
?>

<?php include_once('parts/header.php'); ?>
    <div class="py-1">
        <img class="d-block mx-auto mb-4" src="app\Views\img\icone_certifico_site.png" alt="" width="72" height="72">
        <h2>Inscrições Online</h2>
    </div>

    <br>
    <br>

    <div class="row">
        <div class="col-md-6 order-md-1">
            <form class="needs-validation" action="/save_inscricao_users" method="POST" novalidate>

                <?php if (count($valores) > 0): ?>

                    <input type="hidden" name="participante_id" id="participante_id" value="<?php echo $valores[0]; ?>"/>
                    <input type="hidden" name="evento_id" id="evento_id" value="<?php echo $valores[2]; ?>"/>

                    <span>Participante: </span>
                    <span><?php echo $valores[1]; ?></span>

                    <?php else: ?>
                      <span>Nenhum participante selecionado</span>
                    <?php endif; ?>

                    <br>
                    <br>

                    <label for="layout">Cursos</label>
                    <select class="custom-select d-block w-100" name="id_curso" id="id_curso">
                        <option value="">Escolha...</option>

                        <?php if (count($cursos) > 0): ?>
                            <?php foreach ($cursos as $curso): ?>

                                <option value="<?php echo $curso['id']; ?>"><?php echo Utf8_encode($curso['nome']); ?> - <?php echo Utf8_encode($curso['turno']); ?></option>

                            <?php endforeach; ?>

                        <?php else: ?>
                            Nenhum usuário cadastrado
                        <?php endif; ?>
                    </select>
                    <div class="invalid-feedback">
                        Please provide a valid state.
                    </div>
        <br>
        <button class="btn btn-primary btn-lg" type="submit" name="inscricao">Confirmar</button>
        </form>
    </div>
</div>

<!--
<script src="app\Views\js\zepto.min.js"></script>
<script type="text/javascript" src="app\Views\js\jsapi.js"></script>
<script src="app\Views\js\jquery.min.js"></script>
-->
<?php include_once('parts/footer.php'); ?>

<?php
} else {
      header("location: /");
      exit;
}
 ?><!-- Caso sessão esteja vazia -->
