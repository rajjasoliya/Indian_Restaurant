<?PHP include "config.php";

// $post_id = $_POST['c_id'];
// echo $result = mysqli_query($connection,"SELECT COUNT(pcategory) AS `count` FROM `post` WHERE `pcategory` = {$post_id} ");
// $row = mysqli_fetch_assoc($result);
// $count = $row['count'];

$limit2  = 3;
if(isset($_POST['c_page'])){
  $page = $_POST['c_page'];
}
else{
   $page = 1;
}
 $offset2 =(($page - 1) * $limit2);      

if(isset($_POST['c_id'])){
   $id = $_POST['c_id']; 
   $query6a = "SELECT * FROM post WHERE pcategory = {$id} LIMIT $offset2, $limit2";
   $result6a = mysqli_query($connection, $query6a) or die("Couldn't connect to Query'");
   if(mysqli_num_rows($result6a) > 0){
       while($row6a = mysqli_fetch_array($result6a)){
   ?>
<div class="div11">
<img class="div11img" src="img/<?PHP echo $row6a['pimage']; ?>"><div class="overlay0"><h3> <?PHP echo $row6a['pname']; ?></h3><p><?PHP echo $row6a['pdesc']; ?></p><h4 class="price1">$<?PHP echo $row6a['pprice']; ?></h4><div><a class="add-to-cart" href="add-to-cart.php?pid=<?PHP echo $row6a['pid']; ?>">Add to Cart</a></div></div>
</div>  <?PHP   }}}  ?>  
<?PHP
$id = $_POST['c_id'];
$pages = "SELECT COUNT(pcategory)/{$id}  AS `count` FROM post WHERE pcategory = {$id}";
$result7a = mysqli_query($connection, $pages) or die("Couldn't connect to Query'");
// $query7a = "SELECT * FROM post where pcategory = {$id} ";
//        $result7a = mysqli_query($connection, $query7a) or die("Couldn't connect to Query'");
//    $total_records3a = mysqli_num_rows($result7a);
$row = mysqli_fetch_assoc($result7a);
$count = $row['count'];
      $total_page3a = ceil($count / $limit2);
       echo "<ul id='ul_cat' type='none' style='display:flex;margin-left:49%;margin-top:10px;'>";
       for($i = 1 ; $i <= $total_page3a ; $i++){
          if($i == $page){
              $style = "border-radius:5px;font-size:15px;background-color:#fa9805;color:white;";
          }
          else{
              $style = "";
          }
           echo "<li style='cursor: pointer;'><a class='post-page' style='{$style}' id=$i>$i</a></li>";
       }
?> 