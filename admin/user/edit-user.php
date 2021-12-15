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
$uid = $_GET['uid'];
$query = "SELECT * FROM user WHERE uid = {$uid}";
$result = mysqli_query($connection, $query) or die("Error getting user");
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){

    
?>
<label for="name">Name : </label>
<input type="text" name="name" value="<?PHP echo $row['uname'];  ?>"><br><br>
<lable for="username">Username : </lable>
<input type="text" name="username" value="<?PHP echo $row['username']; ?>"><br><br>
<lable for="email">E-Mail : </lable>
<input type="email" name="email" value="<?PHP echo $row['email']; ?>"><br><br>
<lable for="password">Password : </lable>
<input type="password" name="password" value="<?PHP echo $row['password']; ?>"><br><br>
<lable for="role">Role : </lable>
<select name="role">
<option>Choose Role</option>
<?PHP 
$query1 = "SELECT * FROM role";
$result1 = mysqli_query($connection, $query1);
if(mysqli_num_rows($result1) > 0){
    while($row1 = mysqli_fetch_array($result1)){
        if($row['role'] == $row1['rid']){
            $select = "selected";
        }
        else{
            $select = "";
        }
        echo "<option {$select} value='{$row1['rid']}'>{$row1['rname']}</option>";
    }
}
?>
</select>
<br><br>
<button type="submit" name="edit">Edit</button>
<?PHP }
} ?>
</form>
<?PHP 
if(isset($_POST['edit'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $query2 = "UPDATE user SET uname = '$name',username = '$username',email = '$email',password = '$password',role = '$role' WHERE uid = {$uid};";
    $result2 = mysqli_query($connection,$query2) or die("Query not executed ");
    if($result2){
        header("Location:http://localhost/restaurent/admin/user/");
    }
}
?>
</body>
</html>