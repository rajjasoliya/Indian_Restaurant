<?PHP include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indian Restaurant</title>
</head>
<body>
    <section id="header">
    <div class="mainline">
    <div class="imp-nav">
        <a class="imp-cart" href="add-to-cart.php"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
        <a class="imp-login" href="login-index.php" >Log in</a>
        <a class="imp-logout-a" href="logout.php" >Log Out</a>
    </div>
        <div class="images">
        
        <?PHP 
                    $limit = 1;
                    if(isset($_GET['page'])) {
                        $page = $_GET['page'];
                    }
                    else{
                        $page = 1;
                    }
                    $offset = ($page - 1) * $limit;
                    $query = "SELECT * FROM homepage LIMIT $offset,$limit";
                    $result = mysqli_query($connection, $query) or die("Couldn't connect to Query'");
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                    
                    ?>
            <img class="right" src="img/right.png"><img class="dish" src="img/<?PHP echo $row['himage']; ?>">
        </div>
    </div>
            <div class="logo"><img src="img/logo.png"></div>
            <div class="link">
                <a href="#header" >Home</a>
                <a href="#main" >Menu</a>
                <a href="#desc" >Reservation</a>
                <a href="#sey" >Pages</a>
                <a href="#why" >Blogs</a>
                <a href="#why" >Gallery</a>
                <a href="#footer">Contacts</a>
            </div>
            <!--Text-->
                <div class="text">
                    <h4 class="wlcm">Welcome to</h4>

                    <div class="h1"><?PHP echo $row['hquotes']; ?></div>
                    <p><?PHP echo $row['hdesc']; ?></p>
                    <button class="book2"><?PHP echo $row['hbutton']; ?></button>
                    <?PHP
                $query0 = "SELECT * FROM homepage";
                $result0 = mysqli_query($connection, $query0) or die("Couldn't connect to Query'");
                $total_records =mysqli_num_rows($result0);
                $total_page = ceil($total_records/$limit);
                echo "<ul type='none'>";
                for($i =1 ; $i <= $total_page ; $i++) {
                    if($i == $page){
                        $style = "background-color:#eca406;font-size:15px";
                    }
                    else{
                        $style = "";
                    }
                    echo "<li><a class='dot' href='index.php?page=".$i."'><div class='ellips'><span style='".$style."' class='pages'></span></div></a></li>";
                }
                
                echo "</ul>";
                        }
                    }
                ?>
                
                
                </div>

               
    </section>
    <!---Description-->
    <section id="desc">
       <?PHP
       $limit1 = 1;
       if(isset($_GET['about_page'])){
           $about_page = $_GET['about_page'];
       }
       else{
           $about_page = 1;
       }
       $offset1 = ($about_page - 1) * $limit1;
       $query2 = "SELECT * FROM about LIMIT $offset1,$limit1";
       $result2 = mysqli_query($connection, $query2) or die("Couldn't connect to Query'");
       if(mysqli_num_rows($result2) > 0){
           while($row2 = mysqli_fetch_array($result2)){
       ?>
        <div class="sec2img"> <img class="sec2back" src="img/<?PHP echo $row2['aimg']; ?>"><img class="sec2cabbage" src="img/sec2cabbage.png"><img class="sec2kiwi" src="img/sec2kiwi.png"><img class="sec2dish" src="img/<?PHP echo $row2['aimg2']; ?>"></div>
        <div class="sec2txt">
         <h4 class="aboutus">ABOUT US</h4><h1 class="sec2h1"><?PHP echo $row2['atitle']; ?></h1><p class="sec2p"><?PHP echo $row2['adesc']; ?></p>
          <button class="read-more">Read More</button>
        <?PHP
       $query3 = "SELECT * FROM about";
       $result3 = mysqli_query($connection, $query3);
       $total_records2 = mysqli_num_rows($result3);
       $total_page2 = ceil($total_records2 / $limit1);
       echo "<ul type='none'>";
       for($i = 1 ;$i <= $total_page2 ; $i++){
        if($i == $about_page){
            $style = "background-color:#eca406;font-size:15px";
        }
        else{
            $style = "";
        }
           echo "<li><a class='dot2' href='index.php?about_page=".$i."'><div class='ellips'><span style='".$style."' class='pages'></span></div></a></li>";
       }
       echo "</ul>";
    }
}

       ?>
       </div>
        <div class="open">
            <?PHP 
            $query1 = "SELECT * FROM status";
            $result1 = mysqli_query($connection, $query1) or die("Couldn't connect to Query'");
            if(mysqli_num_rows($result1) > 0) {
                while($row1 = mysqli_fetch_array($result1)){
               ?>
            <div class="first-icon"><i class="fa fa-<?PHP echo $row1['sicon'];?>" aria-hidden="true"></i><h3><?PHP echo $row1['sname']; ?></h3><p><?PHP echo $row1['sdesc']; ?></p></div><?PHP  }}  ?>
      </div>
    </section>
     <!--section 3 why choose us-->
     <section id="why">
         <h4>Work</h4><h1>Why Choose Us?</h1>
             <div class="sec3">
                <?PHP 
                 $query4 = "SELECT * FROM whywe";
                 $result4 = mysqli_query($connection, $query4) or die("Couldn't connect to Query'");
                 if(mysqli_num_rows($result4) > 0){
                     while($row4 = mysqli_fetch_array($result4)){
                ?>
            <div class="first"><i class="fa fa-<?PHP  echo $row4['wicon']; ?>" aria-hidden="true"></i><br><h3><?PHP echo $row4['wname']; ?></h3><p><?PHP echo $row4['wdesc']; ?></p></div>
                <?PHP }} ?>
            </div>
            <img class="leftt" src="img/left.png"><img class="rightt" src="img/rightt.png">
         </h1>
     </section>
     <!--Section 4 Main Section-->
     <section id="main">
         <div class="main-head">
            <a href="paginetion.php" onMouseOver="this.style.color='#fa9805';this.style.background='white'"onMouseOut="this.style.color='white';this.style.background='#fa9805';"  class="main-manu-a" style="text-decoration: none;font-weight:bold;padding:5px;background:#fa9805;color:white;border-radius:4px;margin-left:48%">MENU</a><h1 style="padding-top:20px">Explore Our Menu</h1>
         </div>
         <div id="ajax_category" class="main-bar">
         </div>
         <div id="ajax_manu" class="pht-div1">
         </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script type="text/javascript">
             $(document).ready(function() {

                 const loadCategory = function(){
                     $.ajax({
                         url:"ajax_category.php",
                         type:"post",
                        //  data:{post_c_id:post_c_id},
                         success:function(data) {
                            //  alert(data);
                             $("#ajax_category").html(data);
                         }
                     });
                 }
                 loadCategory();
                 const loadModel = (c_id) => {
                     $.ajax({
                         url:"ajax_model.php",
                         type:"post",
                         data:{c_id:c_id},
                         success:function(data) {
                            //  alert(data);
                             $("#ajax_manu").html(data);
                         }
                     });
                 }
                 $(document).on("click","#ajax_category a",function(e){
                     e.preventDefault();
                     var c_id = $(this).attr('id');
                    //  alert(c_id);
                     loadModel(c_id);
                     $(document).on("click","#ul_cat li a",function(e){
                     e.preventDefault();
                     var c_pages = $(this).attr('id');
                    //  alert(c_pages);
                     loadPages(c_id,c_pages)
                 });
                 });
                const loadPages = (c_id,c_page) => {
                    $.ajax({
                         url:"ajax_model.php",
                         type:"post",
                         data:{c_id:c_id,c_page:c_page},
                         success:function(data) {
                            //  alert(data);
                             $("#ajax_manu").html(data);
                         }
                     });
                }
                
                    
                 const loadManu = (page) => {
                     $.ajax({
                         url:"ajax_manu.php",
                         type:"post",
                         data:{page:page},
                         success:function(data) {
                            //  alert(data);
                             $("#ajax_manu").html(data);
                         }
                     });
                 }
                 loadManu();
                 $(".main-head").on('click', function(e){
                     e.preventDefault();
                     loadManu();
                 });
                 $(document).on('click',"#pagination_ul li a",function(e){
                     e.preventDefault();
                     var pages = $(this).attr('id');
                    // alert(pages);
                    loadManu(pages);
                 });

             });
         </script>
             <br>
        <img class="l" src="img/l.png"><img class="ll" src="img/l.png">
     </section>
     <div class="move">
     <!---What Custmer seys-->
     <section id="sey">
         <h4>TESTIMONIAL</h4><h1>What Our Customer Say's</h1>
    <div id="ajax_testimonial" class="para">
    </div>
         <script type="text/javascript">
             $(document).ready(function() {

                 const loadTest = function(page_no){
                     $.ajax({
                         url:"ajax_testimonial.php",
                         type:"post",
                         data:{page_no:page_no},
                         success:function(data) {
                            //  alert(data);
                             $("#ajax_testimonial").html(data);
                         }
                     });
                 }
                 loadTest();
                 $(document).on('click',"#ajax_testimonial a.test_class",function(e){
                     e.preventDefault();
                     var pages = $(this).attr('id');
                    // alert(pages);
                    loadTest(pages);
                 });

                });
                </script>
         <img class="mar" src="img/mar.png">
     </section>
     <section id="footer">
         <img class="logo1" src="img/logo.png"><h4>First, we eat. Then, we do
            everything else</h4>
            <div class="quick"><h2>Quick_Links</h2>
                <a href="#header">Home</a>
                <a href="#main">Menu</a>
                <a href="#desc">Reservation</a>
                <a href="#sey">Pages</a>
                <a href="#aboutus">Blogs</a>
                <a href="#why">Gallery</a>
                <a href="#footer">Contacts</a>
            </div>
            <div class="about"><h2>About Us</h2><p>Everything began in 1946 when the proprietor 
                opened his first espresso and doughnut and 
                sandwich shop. It was gigantically fruitful and
                 this driven him to begin another shop called 
                organization name. He opened the principal
                 store in 1950 in India.</p></div>
                 <div class="follow">
                     <h2>Follow Us</h2>
                     <?PHP 
                     $query10 = " SELECT * FROM follow";
                     $result10 = mysqli_query($connection, $query10) or die("Couldn't connect to Query'");
                     if(mysqli_num_rows($result10) > 0){
                         while($row10 = mysqli_fetch_array($result10)){
                     ?>
                     <div class="<?PHP echo $row10['fname']; ?>"><i class="fa fa-<?PHP echo $row10['ficon']; ?> display" aria-hidden="true"></i>  <a class="social_media" href="<?PHP echo $row10['flink']; ?>" target = "_blank"><h3 class="display"><?PHP echo $row10['fname']; ?></h3></a></div>
                     <?PHP 
                         }
                     } ?>
                 </div>
                 <img class="mar2" src="img/mar.png" /><img class="prvimg" src="img/dd.png">
     </section>
     <script>
var scroll = new SmoothScroll('a[href*="#"]', {
	speed: 1000,
	speedAsDuration: true
});
     </script>
</body>
</html>