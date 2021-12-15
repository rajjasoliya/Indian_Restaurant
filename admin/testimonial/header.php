
<?PHP 
if($_SESSION['user_role'] == 2){
    header('Location:http://localhost/restaurent/admin');
}
?><!DOCTYPE html>
<html lang="en">
<head>
<style>
*{
    margin:0;
    padding:0;
}
.header-container{
    width:100%;
    height:250px;
    background-color:#faa80a;
}
.header-content{
    display:inline;
}
.logo-img{
    margin:20px;
}
.logout-txt{
    color:#000;
    float:right;
    padding:20px;
}
.header-nav{
    padding: 10px;
    display:flex;
    background-color:#ccc;
}
li a{
    color:#000;
    font-size: 15px;
    text-decoration: none;
    font-weight: bold;
    margin-left:25px ;
}
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="header-container">
    <div class="header-content">
    <img src="logo.png" class="logo-img">
    <a class="logout-txt" href="../logout.php">Hello <?PHP echo $_SESSION['username']; ?> Logout</a>
</div>
    </div>
    <ul class="header-nav" type="none">
    <li><a href="../user/">USER</a></li>
    <li><a href="../post/">POST</a></li>
    <li><a href="../category/">CATEGORIES</a></li>
    <li><a href="../home_page/">HOME_PAGE</a></li>
    <li><a href="../about_page/">ABOUT_PAGE</a></li>
    <li><a href="../status/">STATUS</a></li>
    <li><a href="index.php">TESTIMONIALS</a></li>
    <li><a href="../social_media/">SOCIAL_MEDIA</a></li>
    </ul>
</body>
</html>