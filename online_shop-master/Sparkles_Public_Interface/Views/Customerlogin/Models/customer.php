<?php
/**
 * Created by PhpStorm.
 * User: alyatalat
 * Date: 2016-04-13
 * Time: 10:12 PM
 */

class customer
{
    private $conn;

/*    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }*/

    public function runQuery($sql)
    {
        require_once('database.php');
        require_once('dbclass.php');
        $db = Dbclass::getDB();
          $stmt = $db->prepare($sql);
  //      $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function register($uname,$umail,$upass)
    {
        try
        {
            $new_password = password_hash($upass, PASSWORD_DEFAULT);

            $stmt = ("INSERT INTO users(user_name,user_email,user_pass)
		                                               VALUES(:uname, :umail, :upass)");

            $stmt->bindparam(":uname", $uname);
            $stmt->bindparam(":umail", $umail);
            $stmt->bindparam(":upass", $new_password);

            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }


    public function doLogin($umail,$upass)
    {
        try
        {
            require_once('database.php');
            require_once('dbclass.php');
            $db = Dbclass::getDB();
            $stmt = $db->prepare("SELECT user_id, user_email, user_pass FROM users WHERE user_email=:umail ");
            $stmt->execute(array(':umail'=>$umail));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);


            if($stmt->rowCount() == 1)
            {
                if(password_verify($upass, $userRow['user_pass']))
                {
                    $_SESSION['user_session'] = $userRow['user_id'];
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function is_loggedin()
    {
        if(isset($_SESSION['user_session']))
        {
            return true;
        }
    }

   // public function redirect($url){header('Location:'.$url);}

    public function doLogout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }

}

?>