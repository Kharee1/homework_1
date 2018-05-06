<?php

{
    private static $username = 'keo6';
    private static $password = 'gntCaHLz';
    private static $dsn = 'mysql:host=sql2.njit.edu;dbname=keo6';
    private static $db;
    private function __construct() {}
    public static function getDB() {
        if (!isset(self::$db)) { 
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
                echo '<h2>Connected to the database successfully!</h2>';
            } catch (PDOException $error) {
                echo '<h3>Database Error</h3>';
                echo $error->getMessage().'<br>';
                exit();
            } catch (Exception $e) {
                echo '<h3>Generic Error</h3>';
                echo $e->getMessage().'<br>';
                exit();
            }
        } 
        return self::$db;
    }
}
?>