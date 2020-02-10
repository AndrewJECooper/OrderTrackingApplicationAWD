<?php

    namespace App\Login;
    require_once "Connector.php";
    use \PDO;
    use App\IDatabase;

    class Login extends PDO
    {
        //Attributes
        private $_dbServer = "mysql:host=localhost; dbname=awd_assignment";
        private $_dbUser = "root";
        private $_dbPwd = "";
        
        //Construct
        public function __construct()
        {
            $dbServer = $this->_dbServer;
            $dbUser = $this->_dbUser;
            $dbPwd = $this->_dbPwd;
    
            try
            {
                $link = new PDO($dbServer, $dbUser, $dbPwd);
            }
            catch(Exception $errorMessage)
            {
                echo "Unable to connect to database";
            }
        }
        //Methods for properties
    
        //Methods
        public function CheckLogin($email, $password, $link)
        {
            $query = "SELECT * FROM users WHERE Email LIKE '$email' AND Password LIKE '$password'";
            $statement = $link->prepare($query);
            $statement->execute(array($email,$password));
    
            $num = $statement->rowCount();
    
            if($num == 1)
                {
                    session_start();
                    $_SESSION["Email"] = $email;
                    header("Location: OrderCheck.php");
                }
            else
                {
                    header("Location: index.php");
                }
        }
    }
?>
    
