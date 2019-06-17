<?php
//login_success.php
session_start();
if (isset($_SESSION["usuario"])) {
?>
<?php include("head.php"); ?>
    <div class="starter-template">
        <img class="img-fluid mb-4" src="app\Views\img\Certifico.png" alt="" >
    </div>
<?php include("footer.php"); ?>
<?php
} else {
    header("location: /");
}
