<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style3.css">
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
        <form method="post" action="<?PHP $_SERVER['PHP_SELF']; ?>">
        <div><img class="product-img" name="product-img" src="img/<?php echo $row['pimage'];?>"></div>
        <div class="product-txt">
            <div class="product-name"><input disabled type="text" name="product-name" value="<?PHP echo $row['pname']; ?>"></div>
            <div class="product-desc"><input disabled type="text" name="product-desc" value="<?PHP echo $row['pdesc']; ?>"></div>
            <div class="product-price"><input type="text" name="product-price" value="<?PHP echo $row['pprice']; ?>"></div>
            <?PHP $query1 = "SELECT * FROM orders";$result1=mysqli_query($connection,$query1);if(mysqli_num_rows($result1) > 0){while($row1 = mysqli_fetch_assoc($result1)){ ?>
            <input type="number" disabled name="quantity" value="<?PHP echo $row1['oquantity']; ?>" class="quantity" style="width: 3em" placeholder="00">  
            <?PHP }} ?>          
        </div>
        <div class="payment-txt">
        <div class="payment-address"><lable for="address">Address: </lable><textarea  name="address" placeholder="Address..."></textarea></div>
        <div class="payment-bank"><lable for="bank">Bank: </lable><select name="bank"><option>Choose Bank</option><?PHP $query2="SELECT * FROM bank";$result2=mysqli_query($connection,$query2);if(mysqli_num_rows($result2) > 0) { while ($row2 = mysqli_fetch_array($result2)){?><option value="<?PHP echo $row2['bid']; ?>"><?PHP echo $row2['bname'] ?></option><?PHP  }} ?></select></div>
        <button name="payment" class="product-payment">PAY</button>
        
        </form>
        </div>
    </div>
<br><br><hr><br><br>
<?PHP
    }}}else{
    echo "Oops You have to Order Something!!!";
    }
    if(isset($_POST['payment'])){
        $pay_user = $_SESSION['user_id'];
        $pay_address = $_POST['address'];
        $pay_bank = $_POST['bank'];
        $pay_price = $_POST['product-price'];
        echo $query3="INSERT INTO payment(paypost,payuser,payaddress,paybank,payprice) values({$pid},{$pay_user},'{$pay_address}',{$pay_bank},{$pay_price})";
        $result3=mysqli_query($connection,$query3) or die("Couldn't execute query'");
        if($result3){
            header("Location:http://localhost/restaurent/admin/");
        }
    }
?>
</div>
</body>
</html>