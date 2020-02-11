<?

namespace App;
require_once "IDatabase.php";
require_once "Connector.php";
use \PDO;
use App\IDatabase;

class PDO_DB extends PDO
{
    //Attributes
    private $_dbServer = "mysql:host=localhost; dbname=awd_assignment";
    private $_dbUser = "root";
    private $_dbPwd = "";
    private $_link;
    
    //Construct
    public function __construct()
    {
        $dbServer = $this->_dbServer;
        $dbUser = $this->_dbUser;
        $dbPwd = $this->_dbPwd;

        try
        {
            $link = new PDO($dbServer, $dbUser, $dbPwd);
            $this->_link = $link;
        }
        catch(Exception $errorMessage)
        {
            echo "Unable to connect to database";
        }
    }
    //Methods for properties

    //Methods
    public function QueryDatabase($email, $password, $link)
    {
        
    }

    public function WriteToDatabase($add1, $add2, $customerId, $postcode, $description, $email, $dateAdded, $link)
    {
        $stmt = "INSERT INTO orders(CustomerId, AddressLine1, AddressLine2, Postcode, ItemDescription, DateAdded) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $link->prepare($stmt);
        $stmt->execute([$customerId, $add1, $add2, $postcode, $description, $email, $dateAdded]);
    }

    public function RemoveFromDatabase()
    {

    }
    public function UpdateInfoDatabase()
    {
        
    }

}
?>