<?PHP 
session_start();
if($_SESSION['user_role'] == 2){
    header('Location:http://localhost/restaurent/admin');
}
?><?PHP include "header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
        table{
            position:absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
        th{
            color: #fff;
            background-color: #cba;
            padding:5px;
            border-radius: 5px;
        }
        button{
            border:none;
            background-color: #acb;
            border-radius: 5px;
            padding: 5px;
        }
        button a{
            font-size:18px;    
            color:#fff;
            text-decoration: none;
        }
        .add-user{
            text-decoration: none;
            background-color: #ccc;
            color: #fff;
            font-weight: 600;
            padding: 10px;
            float:center;
            margin-left:50%;
        }
        </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <caption><a href="add-user.php" class="add-user">Add User</a></caption>
    <table width="50%" cellspacing="25" cellpadding="0">
    <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>E-Mail</th>
            <th>Password</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?PHP include "config.php"; $query="SELECT * FROM user";$result=mysqli_query($connection,$query); if(mysqli_num_rows($result)){ while ($row = mysqli_fetch_array($result)){ ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['surname'];?></td>
            <td><?PHP echo $row['email']; ?></td>
            <td><?php echo md5($row['password']);?></td>
            <td><?php if($row['role'] == '1'){ echo "Admin";}else{ echo "Normal";}; ?></td>
            <td><button ><a href="edit-user.php?id=<?php echo $row['id'];?>">Edit</a></button></td>
            <td><button><a href="delete-user.php?id=<?php echo $row['id'];?>">Delete</a></button></td>
        </tr>
        <?PHP } } ?>
    </table>
</body>
</html>