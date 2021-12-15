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
$cid = $_GET['cid'];
$query = "SELECT * FROM category WHERE cid = {$cid}";
$result = mysqli_query($connection, $query) or die("Error getting user");
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
?>
<label for="name">Category : </label>
<input type="text" name="name" value="<?PHP echo $row['cname'];  ?>"><br><br>
<lable for="products">Products : </lable>
<input type="text" name="products" value="<?PHP echo $row['cproducts']; ?>"><br><br>
<lable for="icon">Icon : </lable>
<input type="text" name="icon" value="<?PHP echo $row['cicon']; ?>"><br><br>
<lable for="cdesc">Description : </lable>
<input type="text" name="cdesc" value="<?PHP echo $row['cdesc']; ?>"><br><br>
<button type="submit" name="edit">Edit</button>
<?PHP }
} ?>
</form>
<?PHP 
if(isset($_POST['edit'])){
    $name = $_POST['name'];
    $products = $_POST['products'];
    $icon = $_POST['icon'];
    $desc = $_POST['cdesc'];
    $query2 = "UPDATE category SET cname = '$name',cproducts = $products,cicon = '$icon',cdesc = '$desc' WHERE cid = {$cid};";
    $result2 = mysqli_query($connection,$query2) or die("Query not executed ");
    if($result2){
        header("Location:http://localhost/restaurent/admin/category/");
    }
}
?>
</body>
</html>