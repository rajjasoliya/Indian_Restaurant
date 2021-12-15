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

<div ><p  class="working-title">Add Product Page</p></div>    
<form method="post" action="<?PHP $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<label for="pname">Product : </label>
<input type="text" name="pname" ><br><br>
<lable for="pdesc">Description : </lable>
<input type="text" name="pdesc"><br><br>
<lable for="pprice">Price : </lable>
<input type="text" name="pprice" ><br><br>
<lable for="pcategory">Category : </lable>
<select name="pcategory">
<option>Choose Category</option>
<?PHP 
$query1 = "SELECT * FROM category";
$result1 = mysqli_query($connection, $query1);
if(mysqli_num_rows($result1) > 0){
    while($row1 = mysqli_fetch_array($result1)){
       
        echo "<option value='{$row1['cid']}'>{$row1['cname']}</option>";
    }
}
?>
</select>
<br><br>
<lable for="pimage">Image : </lable>
<input type="file" name="pimage" ><br><br>
<label for="powner">Owner : </label>
<input type="text" name="powner" ><br><br>
<button type="submit" name="add">Add</button>
</form>
<?PHP 
if(isset($_POST['add'])){
    $name = $_POST['pname'];
    $desc = $_POST['pdesc'];
    $price= $_POST['pprice'];
    $category = $_POST['pcategory'];
    if(isset($_FILES['pimage'])){
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
    echo $query2 = "INSERT INTO post(pname,pdesc,pprice,pcategory,pimage,powner) VALUES('{$name}','{$desc}',{$price},{$category},'{$image_name}',{$owner}) ;";
    echo $query2 .= "UPDATE category SET cproducts = cproducts + 1 WHERE cid = {$_POST['pcategory']} ;";
    $result2 = mysqli_multi_query($connection,$query2) or die("Query not executed ");
    if($result2){
        header("Location:http://localhost/restaurent/admin/post/");
    }
}
?>
</body>
</html>