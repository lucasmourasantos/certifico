<?php
//login_success.php
session_start();
if (isset($_SESSION["usuario"])) {

} else {
      header("location: /");
      exit;
}
