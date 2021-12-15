<?PHP 
session_start();
if($_SESSION['user_role'] == 2){
    header('Location:http://localhost/restaurent/admin');
}
?>
<?PHP  
include "config.php";
$aid = $_GET['aid'];
$query = "DELETE FROM about WHERE aid = {$aid}";
$result = mysqli_query($connection, $query);
header("Location:http://localhost/restaurent/admin/about_page/");
?>