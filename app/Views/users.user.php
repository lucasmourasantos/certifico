<?php
//login_success.php
session_start();
if (isset($_SESSION["usuario"])) {
?>

<?php include_once('parts/header.php'); ?>

    <div class="starter-template">
        <img class="img-fluid mb-4" src="app\Views\img\Logo Certifico.png" alt="CERTIFICO | Certificado Online" width="" height="">
    </div>
<?php include_once('parts/footer.php'); ?>

<?php
} else {
      header("location: /");
      exit;
}
 ?><!-- Caso sessão esteja vazia -->
