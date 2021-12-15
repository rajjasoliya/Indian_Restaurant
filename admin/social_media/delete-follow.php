<?PHP 
session_start();
if($_SESSION['user_role'] == 2){
    header('Location:http://localhost/restaurent/admin');
}
?><?PHP   
include "config.php";
$fid = $_GET['fid'];
$query = "DELETE FROM follow WHERE fid = {$fid}";
$result = mysqli_query($connection, $query);
header("Location:http://localhost/restaurent/admin/social_media/");
?>