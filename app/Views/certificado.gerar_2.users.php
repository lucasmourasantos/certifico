<?php
//login_success.php
//session_start();
if (isset($_SESSION["usuario"])) {
?>
<?php include_once('parts/header.php'); ?>
    <div class="py-1">
        <img class="d-block mx-auto mb-4" src="app\Views\img\icone_certifico_site.png" alt="" width="72" height="72">
        <h2>Gere seu certificado online</h2>
    </div>
    <br>
    <div class="row">
            <div class="col-md-12 mb-3">
                    <div class="resultadoForm">
                        <input type="hidden" name="participante_id" id="txtstart"/>
                            <table class="table">
                            <thead>
                                <tr>
                                    <td>EVENTO</td>
                                    <td>CURSO</td>
                                    <td>LOCAL</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <?php if (count($users) > 0): ?>
                                <?php foreach ($users as $user): ?>
                                  <tbody>
                                      <tr>
                                          <td><?php echo $user['evento']; ?></td>
                                          <td><?php echo $user['curso']; ?></td>
                                          <td><?php echo $user['local']; ?></td>

                                          <td>
                                            <form class="" action="/emitir_users" method="post" target="_blank">
                                              <input type="hidden" name="cpf" value="<?php echo $user['cpf']; ?>">
                                              <input type="hidden" name="curso" value="<?php echo $user['curso']; ?>">
                                              <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                              <input type="hidden" name="id_curso" value="<?php echo $user['id_curso']; ?>">
                                              <input type="submit" name="emitir" value="Emitir" class="btn btn-info">
                                            </form>
                                          </td>
                                      <?php endforeach; ?>
                                  </tr>
                              </tbody>
                            <?php else: ?>
                                <span>Nenhum participante selecionado</span>
                            <?php endif; ?>
                          </table>

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
