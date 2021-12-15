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
<form method="post" action="<?PHP $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<?PHP 
$pid = $_GET['pid'];
$query = "SELECT * FROM post INNER JOIN category ON post.pcategory = category.cid INNER JOIN user ON post.powner = user.uid WHERE pid = {$pid}";
$result = mysqli_query($connection, $query) or die("Error getting user");
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){

    
?>
<label for="pname">Product : </label>
<input type="text" name="pname" value="<?PHP echo $row['pname'];  ?>"><br><br>
<lable for="pdesc">Description : </lable>
<input type="text" name="pdesc" value="<?PHP echo $row['pdesc']; ?>"><br><br>
<lable for="pprice">Price : </lable>
<input type="text" name="pprice" value="<?PHP echo $row['pprice']; ?>"><br><br>
<input type='hidden' name='old_category' value='<?PHP echo $row["pcategory"]; ?>'><br><br>
<lable for="pcategory">Category : </lable>
<select name="pcategory">
<?PHP 
$query1 = "SELECT * FROM category";
$result1 = mysqli_query($connection, $query1);
if(mysqli_num_rows($result1) > 0){
    while($row1 = mysqli_fetch_array($result1)){
        if($row['pcategory'] == $row1['cid']){
            $select = "selected";
        }
        else{
            $select = "";
        }
        echo "<option {$select} value='{$row1['cid']}'>{$row1['cname']}</option>";
    }
}
?>
</select>
<br><br>
<lable for="pimage">Image : </lable>
<br><br><img src="img/<?PHP echo $row['pimage']; ?>" style="width:200px;height:200px;"><br><br>
<input type="file" name="pimage" ><br><br>
<input type="hidden" name="old_img" value="<?php echo $row['pimage']; ?>"><br><br>
<label for="owner">Owner : </label>
<input type="text" name="powner" value="<?PHP echo $row['powner']; ?>"><br><br>
<button type="submit" name="edit">Edit</button>
<?PHP }
} ?>
</form>
<?PHP 
if(isset($_POST['edit'])){
    $name = $_POST['pname'];
    $desc = $_POST['pdesc'];
    $price= $_POST['pprice'];
    $category = $_POST['pcategory'];
    $old_category = $_POST['old_category'];
    if(empty($_FILES['pimage']['name'])){
        $image_name = $_POST['old_img'];
    }else{
        $error = array();
        $image_name = $_FILES['pimage']['name'];
        $image_size = $_FILES['pimage']['size'];
        $image_temp = $_FILES['pimage']['tmp_name'];
        $image_type = $_FILES['pimage']['type'];
        $extension = array("jpg","jpeg","png");
        $image_ext0 = explode(".",$image_name);
        $image_ext = end($image_ext0);
        if(in_array($image_ext,$extension) === false ){
            $error[] = "Invalid extension";
        }
        $target = "images/".$image_name;
        if(empty($error) == true){
            move_uploaded_file($image_temp,$target) or die("sorry");
        }
        else{
            echo "Final error: ";
        }
    }
    
    $owner = $_POST['powner'];
    $query2 = "UPDATE post SET pname = '{$name}',pdesc = '{$desc}',pprice = {$price},pcategory = {$category},pimage = '{$image_name}',powner = {$owner} WHERE pid = {$pid};";
    
    if($_POST['old_category'] != $category){
    $query2 .= "UPDATE category SET cproducts = cproducts + 1 WHERE cid = {$category};";
    $query2 .= "UPDATE category SET cproducts = cproducts - 1 WHERE cid = {$old_category};";
    }
    $result2 = mysqli_multi_query($connection,$query2) or die("Query not executed ");
    if($result2){
        header("Location:http://localhost/restaurent/admin/post/");
    }
}
?>
</body>
</html>
