<?PHP
session_start();
if ($_SESSION['user_role'] == 2) {
    header('Location:http://localhost/restaurent/admin');
}
?><?PHP include "header.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table {
            margin-top: 50px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        th {
            color: #fff;
            background-color: #cba;
            padding: 5px;
            border-radius: 5px;
        }

        button {
            border: none;
            background-color: #acb;
            border-radius: 5px;
            padding: 5px;
        }

        button a {
            font-size: 18px;
            color: #fff;
            text-decoration: none;
        }

        .add-user {
            text-decoration: none;
            background-color: #ccc;
            color: #fff;
            font-weight: 600;
            padding: 10px;
            float: center;
            margin-left: 50%;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <caption><a href="add-post.php" class="add-user">Add Product</a></caption>
    <table width="50%" cellspacing="25" cellpadding="0">
        <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th>
            <th>Owner</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?PHP include "config.php";
        $limit = 3;
        if (isset($_GET['post_page'])) {
            $post_page = $_GET['post_page'];
        } else {
            $post_page = 1;
        }
        $offset = ($post_page - 1) * $limit;
        $query = "SELECT * FROM post  INNER JOIN category ON post.pcategory = category.cid INNER JOIN user ON post.powner = user.uid LIMIT $offset,$limit;";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['pid']; ?></td>
                    <td><?php echo $row['pname']; ?></td>
                    <td><?php echo $row['pdesc']; ?></td>
                    <td><?php echo "$" . $row['pprice']; ?></td>
                    <td><?PHP echo $row['cname']; ?></td>
                    <td><?php echo $row['pimage']; ?></td>
                    <td><?php echo $row['uname']; ?></td>
                    <td><button><a href="edit-post.php?pid=<?php echo $row['pid']; ?>">Edit</a></button></td>
                    <td><button><a href="delete-post.php?pid=<?php echo $row['pid']; ?>&cid=<?PHP echo $row['cid']; ?>">Delete</a></button></td>
                </tr>
        <?PHP }
        }
        $query1 = "SELECT * FROM post";
        $result1 = mysqli_query($connection, $query1);
        $total_records = mysqli_num_rows($result1);
        $total_page = ceil($total_records / $limit);
        echo "<ul style='display:flex;margin:10px;' type='none'>";
        for ($i = 1; $i <= $total_page; $i++) {
            if ($i == $post_page) {
                $style = "background:#ccc;padding:10px;";
            } else {
                $style = "";
            }
            echo "<li><a style='" . $style . "' href='index.php?post_page=" . $i . "'>$i</a></li>";
        }
        echo "</ul>" ?>
    </table>
</body>

</html>