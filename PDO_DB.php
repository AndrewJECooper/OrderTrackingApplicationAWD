<?

namespace App;
require_once "IDatabase.php";
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
    public function GetOrders()
    {
        $stmt = $this->_link->prepare("SELECT o.Id, o.ItemDescription, os.Description, o.DateAdded FROM orders o INNER JOIN orderstatus os ON o.StatusId = os.Id INNER JOIN users u ON o.CustomerId = u.Id WHERE u.Email = '{$_SESSION['Email']}' ORDER BY o.DateAdded ASC");
        $stmt->execute();
        //$orders = $stmt->fetch();

        while($orders = $stmt->fetchAll())
        {
            return $orders;
        }
    }

    public function GetAOrders($id)
	{	
		$stmt = $this->_link->prepare("SELECT o.Id, u.FirstName, u.Surname, u.Email, o.ItemDescription, os.Description, o.DateAdded FROM orders o INNER JOIN orderstatus os ON o.StatusId = os.Id INNER JOIN users u ON o.CustomerId = u.Id WHERE os.Id = '1' ORDER BY o.DateAdded ASC");
        $stmt->execute();

        while($orders = $stmt->fetchAll())
        {
            return $orders;
        }
		
	}

    public function QueryDatabase($query)
    {
        $stmt = $this->_link->prepare("SELECT * FROM orders WHERE ItemDescription LIKE % ? %");
        $stmt->execute([$query]);

        while($orders = $stmt->fetchAll())
        {
            return $orders;
        }
    }

    public function UpdateStatus($id)
    {
        if($statusId == 1)
        {
            $stmt = $this->_link->prepare("UPDATE orders SET StatusId = 2");
            $stmt->execute();
        }
        else
        {
            $stmt = $this->_link->prepare("UPDATE orders SET StatusId = 3");
            $stmt->execute();
        }
        
    }

    public function WriteToDatabase($customerId, $statusId, $dateAdded, $description, $address1, $address2, $postcode)
    {
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

    public function GetUserId($email)
    {
        $stmt = $this->_link->prepare("SELECT Id FROM users WHERE Email = '{$_SESSION['Email']}'");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $customerId = $result[0]['Id'];

        return $customerId;
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
                    header("Location: OrderCheck.php");
                }
            else
                {
                    header("Location: index.php");
                }

    }
}
?>