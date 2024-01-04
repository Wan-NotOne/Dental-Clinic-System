<?PHP
include('config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

//this action is called when the Delete link is clicked
if (isset($_GET["id"]) && $_GET["id"] != "" && isset($_GET["position"]) && $_GET["position"] != "") {
    $id = $_GET["id"];
    $position = $_GET['position'];

    if ($position == 'dentist') {
        $sql = "DELETE FROM dentist WHERE id=" . $id;
    } else {
        $sql = "DELETE FROM nurse WHERE id=" . $id;
    }

    if (mysqli_query($conn, $sql)) {
        $message = "Record deleted successfully<br>";
        include("./admin_delete_message.php");
    } else {
        $message = "Error deleting record: " . mysqli_error($conn) . "<br>";
        include("./admin_delete_message.php");
    }
}
mysqli_close($conn);
