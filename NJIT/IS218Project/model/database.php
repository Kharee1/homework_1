<?php
    $hostname = "sql2.njit.edu" ; 
	  $username = "keo6" ;
	  $password = "gntCaHLz";
	  $dsn = "mysql:host=$hostname;dbname=$username";
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>