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
        $stmt = $this->_link->prepare("SELECT o.Id, o.ItemDescription, o.StatusId, os.Description, o.DateAdded FROM orders o INNER JOIN orderstatus os ON o.StatusId = os.Id INNER JOIN users u ON o.CustomerId = u.Id WHERE u.Email = '{$_SESSION['Email']}' ORDER BY o.Id DESC");
        $stmt->execute();

        while($orders = $stmt->fetchAll())
        {
            return $orders;
        }
    }

    public function GetAOrders()
	{	
		$stmt = $this->_link->prepare("SELECT o.Id, u.FirstName, u.Surname, u.Email, o.ItemDescription, os.Description, o.StatusId, o.DateAdded FROM orders o INNER JOIN orderstatus os ON o.StatusId = os.Id INNER JOIN users u ON o.CustomerId = u.Id WHERE os.Id != '3' ORDER BY o.DateAdded DESC");
        $stmt->execute();

        while($orders = $stmt->fetchAll())
        {
            return $orders;
        }
		
	}

    public function QueryDatabase($query)
    {
        $stmt = $this->_link->prepare("SELECT o.Id, u.FirstName, u.Surname, u.Email, o.ItemDescription, os.Description, o.StatusId, o.DateAdded FROM orders o LEFT JOIN orderstatus os ON o.StatusId = os.Id INNER JOIN users u ON o.CustomerId = u.Id WHERE o.ItemDescription LIKE '%$query%'");
        $stmt->execute();

        
        $orders = $stmt->fetchAll();
        {
            return $orders;
        }
    }

    public function FilterOrders($statusId)
    {
        $stmt = $this->_link->prepare("SELECT o.Id, u.FirstName, u.Surname, u.Email, o.ItemDescription, os.Description, o.StatusId, o.DateAdded FROM orders o INNER JOIN orderstatus os ON o.StatusId = os.Id INNER JOIN users u ON o.CustomerId = u.Id WHERE os.Id = '$statusId' AND u.Email = '{$_SESSION['Email']}' ");
        $stmt->execute();

        $orders = $stmt->fetchAll();
        {
            return $orders;
        }
    }

    public function UpdateStatus($orderId, $statusId)
    {
        if($statusId == 1)
        {
            $stmt = $this->_link->prepare("UPDATE orders SET StatusId = '2' WHERE Id LIKE ?");
            $stmt->execute([$orderId]);
        }
        else
        {
            $stmt = $this->_link->prepare("UPDATE orders SET StatusId = '3' WHERE Id Like ?");
            $stmt->execute([$orderId]);
        }

    }

    public function WriteToDatabase($customerId, $statusId, $dateAdded, $description, $address1, $address2, $postcode)
    {
        $stmt = "INSERT INTO orders(CustomerId, StatusId, DateAdded, ItemDescription, AddressLine1, AddressLine2, Postcode) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->_link->prepare($stmt);
        $stmt->execute([$customerId, $statusId, $dateAdded, $description, $address1, $address2, $postcode]);
    }

    public function RemoveFromDatabase($id)
    {
        $stmt = $this->_link->prepare("DELETE FROM orders WHERE Id = ?");
        $stmt->execute([$id]);
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