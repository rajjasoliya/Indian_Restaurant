<?PHP 
session_start();
if($_SESSION['user_role'] == 2){
    header('Location:http://localhost/restaurent/admin');
}
?>
<?PHP 
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

<div ><p class="working-title">Add Category Page</p></div>    
<form method="post" action="<?PHP $_SERVER['PHP_SELF']; ?>">
<label for="cname">Category : </label>
<input type="text" name="cname" ><br><br>
<lable for="products">Products : </lable>
<input type="number" name="products" ><br><br>
<lable for="icon">Icon : </lable>
<input type="text" name="icon"><br><br>
<lable for="desc">Description : </lable>
<input type="text" name="desc"><br><br>
<button type="submit" name="add">Add</button>

</form>
<?PHP 
if(isset($_POST['add'])){
    $cname = mysqli_real_escape_string($connection,$_POST['cname']);
    $cproducts = mysqli_real_escape_string($connection,$_POST['products']);
    $cicon = mysqli_real_escape_string($connection,$_POST['icon']);
    $cdesc = mysqli_real_escape_string($connection,$_POST['desc']);
    $query = "SELECT cname FROM category WHERE cname = '$cname'";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result) > 0 ){
        echo "Category Already Exists";
    }
    else{
    $query2 = "INSERT INTO category(cname,cproducts,cicon,cdesc) VALUES('{$cname}',{$cproducts},'{$cicon}','{$cdesc}')";
    $result2 = mysqli_query($connection,$query2) or die("Query not executed ");
    if($result2){
        header("Location:http://localhost/restaurent/admin/category/");
    }
}
}
?>
</body>
</html>