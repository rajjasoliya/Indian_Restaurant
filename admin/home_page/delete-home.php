<?PHP 
session_start();
if($_SESSION['user_role'] == 2){
    header('Location:http://localhost/restaurent/admin');
}
?><?PHP  
include "config.php";
$hid = $_GET['hid'];
$query = "DELETE FROM homepage WHERE hid = {$hid} ";
$result = mysqli_query($connection, $query);
header("Location:http://localhost/restaurent/admin/home_page/");
?>