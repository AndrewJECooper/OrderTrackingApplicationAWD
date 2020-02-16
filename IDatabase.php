<?

namespace App;

Interface IDatabase
{
    public function QueryDatabase($email);
    public function WriteToDatabase($customerId, $statusId, $dateAdded, $description, $address1, $address2, $postcode, $link);
    public function RemoveFromDatabase();
    public function UpdateInfoDatabase();
    public function CheckUser($email, $password);
}

?>