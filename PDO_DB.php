<?

namespace App;
require_once "IDatabase.php";
require_once "Connector.php";
use \PDO;
use App\IDatabase;

class PDO_DB extends PDO implements IDatabase
{
    //Attributes
    private $_dbServer = "mysql:host=localhost; dbname=awd_assignment";
    private $_dbUser = "root";
    private $_dbPwd = "";
    private $_link;
    
    //Construct
    public function __construct()
    {
        $this->_link = new PDO($this->_dbServer, $this->_dbUser, $this->_dbPwd);
    }

    //Methods for properties

    //Methods
    public function QueryDatabase()
    {
        
    }

    public function WriteToDatabase($customerId, $statusId, $dateAdded, $description, $address1, $address2, $postcode)
    {
        session_start();
        $stmt = "INSERT INTO orders(CustomerId, StatusId, DateAdded, ItemDescription, AddressLine1, AddressLine2, Postcode) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->_link->prepare($stmt);
        $stmt->execute([$customerId, $statusId, $dateAdded, $description, $address1, $address2, $postcode]);
    }

    public function RemoveFromDatabase()
    {

    }
    public function UpdateInfoDatabase()
    {
        
    }

    public function CheckUser($email, $password)
    {
        $query = "SELECT * FROM users WHERE Email LIKE ? AND Password LIKE ?";
            $statement = $this->_link->prepare($query);
            $statement->execute([$email,$password]);

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