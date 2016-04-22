<?php
class Database{
    private static $dsn = 'mysql:host=localhost;dbname=sparkles';
    private static $username='root';
    private static $password='';
    private static $db;

    private function __construct()
    {
    }

    public static function getDB()
    {
        if(!isset(self::$db))
        {
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
              //  echo "<b>connected to Database</b><br>";
            }
            catch(PDOException $e)
            {
                $errorMessage = $e->getMessage();
                include('dbError.php');
                die();
            }
        }
        return self::$db;
    }
}


//Database::getDB();