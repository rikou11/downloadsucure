<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location : ./index.php');
    exit();
} else {

    header('location : ../404page.php');
}
