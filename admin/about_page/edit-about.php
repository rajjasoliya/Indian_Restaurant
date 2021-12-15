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

<div ><p  class="working-title">Edit User Page</p></div>    
<form method="post" action="<?PHP $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<?PHP 
$aid = $_GET['aid'];
$query = "SELECT * FROM about WHERE aid = {$aid}";
$result = mysqli_query($connection, $query) or die("Error getting user");
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){    
?>
<label for="atitle">Title : </label>
<input type="text" name="atitle" value="<?PHP echo $row['atitle'];  ?>"><br><br>
<lable for="adesc">Description : </lable>
<input type="text" name="adesc" value="<?PHP echo $row['adesc']; ?>"><br><br>
<lable for="aimg">Image1 : </lable>
<br><br><img src="img/<?PHP echo $row['aimg']; ?>" style="width:200px;height:200px;"><br><br>
<input type="file" name="aimg" ><br><br>
<input type="hidden" name="old_img1" value="<?php echo $row['aimg']; ?>"><br><br>
<lable for="aimg2">Image2 : </lable>
<br><br><img src="img/<?PHP echo $row['aimg2']; ?>" style="width:200px;height:200px;"><br><br>
<input type="file" name="aimg2" ><br><br>
<input type="hidden" name="old_img2" value="<?php echo $row['aimg2']; ?>"><br><br>

<button type="submit" name="edit">Edit</button>
<?PHP }
} ?>
</form>
<?PHP 
if(isset($_POST['edit'])){
    $atitle = $_POST['atitle'];
    $adesc = $_POST['adesc'];
    if(empty($_FILES['aimg']['name'])){
        $image_name = $_POST['old_img1'];
    }else{
        $error = array();
        $image_name = $_FILES['aimg']['name'];
        $image_size = $_FILES['aimg']['size'];
        $image_temp = $_FILES['aimg']['tmp_name'];
        $image_type = $_FILES['aimg']['type'];
        $extension = array("jpg","jpeg","png");
        $image_ext0 = explode(".",$image_name);
        $image_ext = end($image_ext0);
        if(in_array($image_ext,$extension) === false ){
            $error[] = "Invalid extension";
        }
        $target = "img/".$image_name;
        if(empty($error) == true){
            move_uploaded_file($image_temp,$target) or die("sorry");
        }
        else{
            echo "Final error: ";
        }
    }
    ////////////////////////////////////////////////////////////
    $error2 = array();
        if(empty($_FILES['aimg2']['name'])){
            $image_name2 = $_POST['old_img2'];
        }else{
            $error = array();
            $image_name2 = $_FILES['aimg2']['name'];
            $image_size2 = $_FILES['aimg2']['size'];
            $image_temp2 = $_FILES['aimg2']['tmp_name'];
            $image_type2 = $_FILES['aimg2']['type'];
            $extension2 = array("jpg","jpeg","png");
            $image_ext02 = explode(".",$image_name);
            $image_ext2 = end($image_ext02);
            if(in_array($image_ext2,$extension2) === false ){
                $error2[] = "Invalid extension";
            }
            $target2 = "img/".$image_name2;
            if(empty($error2) == true){
                move_uploaded_file($image_temp2,$target2) or die("sorry");
            }
            else{
                echo "Final error: ";
            }
        }

    ///////////////////////////////////////////////////////////

    $query2 = "UPDATE about SET atitle = '{$atitle}',adesc = '{$adesc}',aimg = '{$image_name}',aimg2 = '{$image_name2}' WHERE aid = {$aid};";
    $result2 = mysqli_query($connection,$query2) or die("Query not executed ");
    if($result2){
        header("Location:http://localhost/restaurent/admin/about_page/");
    }
}
?>
</body>
</html>