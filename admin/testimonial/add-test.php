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

<div ><p  class="working-title">Add Testimonial Page</p></div>    
<form method="post" action="<?PHP $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<label for="tname">Name : </label>
<input type="text" name="tname" ><br><br>
<lable for="tdesc">Description : </lable>
<input type="text" name="tdesc"><br><br>
<lable for="trole">Role : </lable>
<input type="text" name="trole"><br><br>
<lable for="timage">Image : </lable>
<input type="file" name="timage" ><br><br>
<button type="submit" name="add">Add</button>
</form>
<?PHP 
if(isset($_POST['add'])){
    $tname = $_POST['tname'];
    $tdesc = $_POST['tdesc'];
    $trole = $_POST['trole'];
    if(empty($_FILES['timage']['name'])){
        $image_name = $_POST['old_img'];
    }else{
        $error = array();
        $image_name = $_FILES['timage']['name'];
        $image_size = $_FILES['timage']['size'];
        $image_temp = $_FILES['timage']['tmp_name'];
        $image_type = $_FILES['timage']['type'];
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
    echo $query2 = "INSERT INTO testimonial(tname,tdesc,trole,timage) VALUES('{$tname}','{$tdesc}','{$trole}','{$image_name}')";
    $result2 = mysqli_query($connection,$query2) or die("Query not executed ");
    if($result2){
        header("Location:http://localhost/restaurent/admin/testimonial/");
    }
}
?>
</body>
</html>