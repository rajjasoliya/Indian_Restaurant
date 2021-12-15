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

<div ><p  class="working-title">Add Home Page</p></div>    
<form method="post" action="<?PHP $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<label for="hquotes">Quotes : </label>
<input type="text" name="hquotes" ><br><br>
<lable for="hdesc">Description : </lable>
<input type="text" name="hdesc"><br><br>
<lable for="hbutton">Button : </lable>
<input type="text" name="hbutton"><br><br>
<lable for="pimage">Image : </lable>
<input type="file" name="himage" ><br><br>
<button type="submit" name="add">Add</button>
</form>
<?PHP 
if(isset($_POST['add'])){
    $hquotes = $_POST['hquotes'];
    $hdesc = $_POST['hdesc'];
    $hbutton = $_POST['hbutton'];
    if(empty($_FILES['himage']['name'])){
        $image_name = $_POST['old_img'];
    }else{
        $error = array();
        $image_name = $_FILES['himage']['name'];
        $image_size = $_FILES['himage']['size'];
        $image_temp = $_FILES['himage']['tmp_name'];
        $image_type = $_FILES['himage']['type'];
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
    echo $query2 = "INSERT INTO homepage(hquotes,hdesc,hbutton,himage) VALUES('{$hquotes}','{$hdesc}','{$hbutton}','{$image_name})";
    $result2 = mysqli_query($connection,$query2) or die("Query not executed ");
    if($result2){
        header("Location:http://localhost/restaurent/admin/home_page/");
    }
}
?>
</body>
</html>