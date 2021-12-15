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
            margin-top: 50px;
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
    <caption><a href="add-test.php" class="add-user">Add Testimonial</a></caption>
    <table width="50%" cellspacing="25" cellpadding="0">
    <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Role</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?PHP include "config.php"; $query="SELECT * FROM testimonial";$result=mysqli_query($connection,$query); if(mysqli_num_rows($result)){ while ($row = mysqli_fetch_array($result)){ ?>
        <tr>
            <td><?php echo $row['tid'];?></td>
            <td><?php echo $row['tname'];?></td>
            <td><?php echo $row['tdesc'];?></td>
            <td><?php echo $row['trole']; ?></td>
            <td><?PHP echo $row['timage']; ?></td>
            <td><button ><a href="edit-test.php?tid=<?php echo $row['tid'];?>">Edit</a></button></td>
            <td><button><a href="delete-test.php?tid=<?php echo $row['tid'];?>">Delete</a></button></td>
        </tr>
        <?PHP } }?>
        </table>
</body>
</html>