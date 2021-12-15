<?PHP 
session_start();
if($_SESSION['user_role'] == 2){
    header('Location:http://localhost/restaurent/admin');
}
?><?PHP  
include "config.php";
$tid = $_GET['tid'];
$query = "DELETE FROM testimonial WHERE tid = {$tid}";
$result = mysqli_query($connection, $query);
header("Location:http://localhost/restaurent/admin/testimonial/");
?>