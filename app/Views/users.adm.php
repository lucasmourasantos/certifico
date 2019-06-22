<?php
//login_success.php
session_start();
if (isset($_SESSION["usuario"])) {
?>
    <div class="starter-template">
        <img class="img-fluid mb-4" src="app\Views\img\Logo Certifico.png" alt="CERTIFICO | Certificado Online" width="" height="">
    </div>
<?php
} else {
    header("location: /");
}
