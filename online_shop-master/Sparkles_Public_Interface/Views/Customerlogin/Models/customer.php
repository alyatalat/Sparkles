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


    public function runQuery($sql)
    {
        require_once('database.php');
        require_once('dbclass.php');
        $db = Dbclass::getDB();
        $stmt = $db->prepare($sql);
        return $stmt;
    }

    public function register($email,$password)
    {
        try
        {
            require_once('database.php');
            require_once('dbclass.php');
            $db = Dbclass::getDB();
            $stmt = $db->prepare("INSERT INTO customer (Email,Password) VALUES( :usermail, :userpass)");
            $stmt->bindparam(":usermail", $email);
            $stmt->bindparam(":userpass", $password);
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
            require_once('dbclass.php');
            $db = Dbclass::getDB();
            $stmt = $db->prepare("SELECT Customer_Id, Email, Password FROM customer WHERE Email=:umail ");
            $stmt->execute(array(':umail'=>$umail));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() == 1)
            {
                // if passwords matching then login and create session based on id of customer
                if($upass == $userRow['Password'])
                {
                  //  echo "here";
                    $_SESSION['user_session'] = $userRow['Customer_Id'];
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