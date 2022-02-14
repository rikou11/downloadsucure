<?php
//  db Configs
$host = 'localhost';
$db_name = 'downloadsecure';
$username = 'root';
$pw = '';
// set Dsn
$dsn = 'mysql:host=' . $host . ';dbname=' . $db_name;
// PDO instance 
try {

    $pdo = new PDO($dsn, $username, $pw);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo 'connexion failed :' . $e->getMessage();
}
