<?PHP 
session_start();
if($_SESSION['user_role'] == 2){
    header('Location:http://localhost/restaurent/admin');
}
?><?PHP 
include "header.php";
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
form{
        position:absolute;
        top:55%;
        left:50%;
        transform:translate(-50%, -50%);
        padding:20px;
        border:2px solid black;
    }
    button,select,input{
        padding:5px;
        font-size: 17px;
        border:2px solid black;
        border-radius:3px;
    }
    .working-title{
        border:2px solid black;
        background:#ccc;
        color:#fff;
        padding:10px;
        text-align: center;
        font-weight: 600;
    }
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div ><p  class="working-title">Edit Social_media Page</p></div>    
<form method="post" action="<?PHP $_SERVER['PHP_SELF']; ?>">
<?PHP 
$fid = $_GET['fid'];
$query = "SELECT * FROM follow WHERE fid = {$fid}";
$result = mysqli_query($connection, $query) or die("Error getting user");
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
?>
<label for="fname">Platform : </label>
<input type="text" name="fname" value="<?PHP echo $row['fname'];  ?>"><br><br>
<lable for="ficon">Icon : </lable>
<input type="text" name="ficon" value="<?PHP echo $row['ficon']; ?>"><br><br>
<lable for="flink">Link : </lable>
<input type="text" name="flink" value="<?PHP echo $row['flink']; ?>"><br><br>
<button type="submit" name="edit">Edit</button>
<?PHP }
} ?>
</form>
<?PHP 
if(isset($_POST['edit'])){
    $fname = $_POST['fname'];
    $ficon = $_POST['ficon'];
    $flink = $_POST['flink'];
    $query2 = "UPDATE follow SET fname = '$fname',ficon = '$ficon',flink = '$flink' WHERE fid = {$fid};";
    $result2 = mysqli_query($connection,$query2) or die("Query not executed ");
    if($result2){
        header("Location:http://localhost/restaurent/admin/social_media/");
    }
}
?>
</body>
</html>