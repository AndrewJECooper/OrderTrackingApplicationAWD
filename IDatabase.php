<?

namespace App;

Interface IDatabase
{
    public function QueryDatabase();
    public function WriteToDatabase($customerId, $statusId, $dateAdded, $description, $address1, $address2, $postcode);
    public function RemoveFromDatabase();
    public function UpdateInfoDatabase();
    public function CheckUser($email, $password);
}

?>