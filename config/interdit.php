<?php
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['password']) && !!isset($_SESSION['token'])) {
    header('location : ./404page.php');
    exit();
}
