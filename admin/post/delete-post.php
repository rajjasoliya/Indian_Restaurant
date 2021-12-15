<?PHP 
session_start();
if($_SESSION['user_role'] == 2){
    header('Location:http://localhost/restaurent/admin');
}
?><?PHP  include "config.php";
$pid = $_GET['pid'];
$query = "DELETE FROM post WHERE pid = {$pid} ;";
$query .= "UPDATE category SET cproducts = cproducts - 1 WHERE cid= {$_GET['cid']};";
$result = mysqli_multi_query($connection, $query);
header("Location:http://localhost/restaurent/admin/post/");
?>