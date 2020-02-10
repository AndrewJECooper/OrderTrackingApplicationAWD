<?

namespace App;

Interface IDatabase
{
    public function QueryDatabase();
    public function WriteToDatabase();
    public function RemoveFromDatabase();
    public function UpdateInfoDatabase();
}

?>