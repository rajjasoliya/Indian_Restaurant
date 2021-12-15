<?PHP 
session_start();
if($_SESSION['user_role'] == 2){
    header('Location:http://localhost/restaurent/admin');
}
?><?PHP 
include "config.php";
$uid = $_GET['uid'];
echo $query = "DELETE FROM user WHERE uid = {$uid} ";
$result = mysqli_query($connection,$query) or die("Error in Deleting Record");
header("Location:http://localhost/restaurent/admin/user/");
?>
