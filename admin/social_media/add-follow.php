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

<div ><p class="working-title">Add Social_Media Page</p></div>    
<form method="post" action="<?PHP $_SERVER['PHP_SELF']; ?>">
<label for="fname">Platform : </label>
<input type="text" name="fname"><br><br>
<lable for="ficon">Icon : </lable>
<input type="text" name="ficon"><br><br>
<lable for="flink">Link : </lable>
<input type="text" name="flink"><br><br>
<button type="submit" name="add">Add</button>

</form>
<?PHP 
if(isset($_POST['add'])){
    $fname = $_POST['fname'];
    $ficon = $_POST['ficon'];
    $flink = $_POST['flink'];
    $query2 = "INSERT INTO follow(fname,ficon,flink) VALUES('{$fname}','{$ficon}','{$flink}')";
    $result2 = mysqli_query($connection,$query2) or die("Query not executed ");
    if($result2){
        header("Location:http://localhost/restaurent/admin/social_media/");
    }
}
?>
</body>
</html>