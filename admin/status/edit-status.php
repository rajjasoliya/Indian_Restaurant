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

<div ><p  class="working-title">Edit User Page</p></div>    
<form method="post" action="<?PHP $_SERVER['PHP_SELF']; ?>">
<?PHP 
$sid = $_GET['sid'];
$query = "SELECT * FROM status WHERE sid = {$sid}";
$result = mysqli_query($connection, $query) or die("Error getting user");
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){

    
?>
<label for="sicon">Icon : </label>
<input type="text" name="sicon" value="<?PHP echo $row['sicon'];  ?>"><br><br>
<lable for="sname">Status Name : </lable>
<input type="text" name="sname" value="<?PHP echo $row['sname']; ?>"><br><br>
<lable for="sdesc">Status Description : </lable>
<input type="text" name="sdesc" value="<?PHP echo $row['sdesc']; ?>"><br><br>
<button type="submit" name="edit">Edit</button>
<?PHP }
} ?>
</form>
<?PHP 
if(isset($_POST['edit'])){
    $sicon = $_POST['sicon'];
    $sname = $_POST['sname'];
    $sdesc = $_POST['sdesc'];
    $query2 = "UPDATE status SET sicon = '{$sicon}',sname = '{$sname}',sdesc = '{$sdesc}' WHERE sid = {$sid};";
    $result2 = mysqli_query($connection,$query2) or die("Query not executed ");
    if($result2){
        header("Location:http://localhost/restaurent/admin/status/");
    }
}
?>
</body>
</html>