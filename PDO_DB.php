<?

namespace App;
require_once "IDatabase.php";
require_once "InsertOrderCon.php";
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
        $insert = "INSERT INTO orders (CustomerId, StatusId, DateAdded, ItemDescription, AddressLine1, AddressLine2, Postcode) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->_link->prepare($insert);
        $stmt->execute(array($customerId, $statusId, $dateAdded, $description, $address1, $address2, $postcode));
    }

    public function RemoveFromDatabase()
    {

    }
    public function UpdateInfoDatabase()
    {
        
    }

    public function CheckUser($email, $password)
    {
        $stmt = "SELECT * FROM users WHERE Email LIKE ? AND Password LIKE ?";
        $stmt = $this->_link->prepare($stmt);
        $stmt->execute([$email,$password]);

        $num = $stmt->rowCount();
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