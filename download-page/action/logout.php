<?php
// ? logout
if (isset($_POST['logout'])) {
    unset($_POST['tokken']);
    unset($_POST['username']);
    unset($_POST['password']);
    session_destroy();
    $_SESSION = array();
    header("location: ../login.php");
}
