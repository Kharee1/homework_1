<?php
    $dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
    $username = 'keo6';
    $password = 'gntCaHLz';
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>