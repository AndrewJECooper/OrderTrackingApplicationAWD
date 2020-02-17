<?

namespace App;
Interface IDatabase
{
    public function QueryDatabase($query);
    public function WriteToDatabase($customerId, $statusId, $dateAdded, $description, $address1, $address2, $postcode);
    public function RemoveFromDatabase($id);
    public function UpdateInfoDatabase();
    public function CheckUser($email, $password);
}

?>