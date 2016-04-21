<?php
class DbConnection {
    private static $dsn = 'mysql:host=localhost;dbname=sparkles';
    private static $username = 'root';
    private static $password = 'fatemeh';
    private static $db;

    private function __construct() {}

    public static function getDB () {

        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);

            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                    //echo $error_message;
                header("location: ../View/Database_error.php?error=$error_message");
                //include("test.php");
                exit();
            }
        }
        return self::$db;
    }
}
?>