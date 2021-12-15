<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
<div class="cart-container">
    <div class="customer"><?PHP session_start(); echo $_SESSION["username"]; ?></div>
<?PHP include "config.php";
if(isset($_GET['pid'])){
    $pid = $_GET['pid'];
    $query = "SELECT * FROM post WHERE pid = '$pid'";
    $result = mysqli_query($connection,$query) or die(" error in load query");
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
?> <div class="cart-content">
        <div><img class="product-img" src="img/<?php echo $row['pimage'];?>"></div>
        <div class="product-txt">
            <div class="product-name"><?PHP echo $row['pname']; ?></div>
            <div class="product-desc"><?PHP echo $row['pdesc']; ?></div>
            <div class="product-price">$<?PHP echo $row['pprice']; ?></div>
            <form method="post" action="<?PHP $_SERVER['PHP_SELF']; ?>">
                <input type="number" name="quantity" class="quantity" style="width: 3em" placeholder="00">
                <button name="payment" class="product-payment"><a href="payment.php?pid=<?php echo $row['pid']; ?>">PAY</a></button>
            </form>
        </div>
    </div>
<br><br><hr><br><br>
<?PHP
    }}}else{
    echo "Oops You have to Order Something!!!";
    }if(isset($_POST['payment'])){
        $quantity = $_POST['quantity'];
      $query1 = "INSERT INTO orders(opost,ouser,odate,oquantity) VALUES({$pid}, {$_SESSION['user_id']},'1234',{$_POST['quantity']})";
        $result1 = mysqli_query($connection,$query1) or die("Sorry BABU");
//         if($result1){
//         header("Location:http://localhost/restaurent/admin/payment.php");
// }
    }
?>
</div>
</body>
</html>
