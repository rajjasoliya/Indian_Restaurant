<?PHP 
session_start();
if($_SESSION['user_role'] == 2){
    header('Location:http://localhost/restaurent/admin');
}
?><?PHP include "config.php";
$cid = $_GET['cid'];
$query = "DELETE FROM category WHERE cid = {$cid}";
$result = mysqli_query($connection, $query);
header("Location:http://localhost/restaurent/admin/category/");
?>
