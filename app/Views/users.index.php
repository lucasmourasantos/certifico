<?php
//login_success.php
session_start();
if (isset($_SESSION["usuario"])) {
?>
    <div class="starter-template">
        <img class="img-fluid mb-4" src="app\Views\img\icone_certifico_site.png" alt="" >
    </div>
<?php
} else {
    header("location: /");
}
