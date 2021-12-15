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

<div ><p  class="working-title">Add About Page</p></div>    
<form method="post" action="<?PHP $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

<label for="atitle">Title : </label>
<input type="text" name="atitle"><br><br>
<lable for="adesc">Description : </lable>
<input type="text" name="adesc"><br><br>
<lable for="aimg">Image1 : </lable>
<input type="file" name="aimg" ><br><br>
<lable for="aimg2">Image2 : </lable>
<input type="file" name="aimg2" ><br><br>
<button type="submit" name="add">Add</button>
</form>
<?PHP 
if(isset($_POST['add'])){
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

    $query2 = "INSERT INTO about(atitle,adesc,aimg,aimg2) VALUES('{$atitle}','{$adesc}','{$image_name}','{$image_name2}')";
    $result2 = mysqli_query($connection,$query2) or die("Query not executed ");
    if($result2){
        header("Location:http://localhost/restaurent/admin/about_page/");
    }
}
?>
</body>
</html>