<?PHP include "config.php";

$limit2  = 3;
if(isset($_POST['page'])){
    $page = $_POST['page'];
}
else{
    $page = 1;
}
$offset2 = ($page - 1) * $limit2;
        
               $query6 = "SELECT * FROM post LIMIT $offset2,$limit2";
               $result6 = mysqli_query($connection, $query6) or die("Couldn't connect to Query'");
               if(mysqli_num_rows($result6) > 0){
                   while($row6 = mysqli_fetch_array($result6)){
?>
   <div class="div11">
       <img class="div11img" src="img/<?PHP echo $row6['pimage']; ?>"><div class="overlay0"><h3><?PHP echo $row6['pname']; ?></h3><p><?PHP echo $row6['pdesc']; ?></p><h4 class="price1">$<?PHP echo $row6['pprice']; ?></h4><div><a class="add-to-cart" href="add-to-cart.php?pid=<?PHP echo $row6['pid']; ?>">Add to Cart</a></div></div> 
   </div>
    <?PHP  }} ?>
   <div>
<?PHP
         $query7 = "SELECT * FROM post";
             $result7 = mysqli_query($connection, $query7) or die("Couldn't connect to Query'");
             $total_records3 = mysqli_num_rows($result7);
             $total_page3 = ceil($total_records3 / $limit2);
             echo "<ul id='pagination_ul' type='none' style='display:flex;flex-wrap:no-wrap;margin-top:10px;'>";
             for($i = 1 ; $i <= $total_page3 ; $i++){
                if($i == $page){
                    $style = "border-radius:5px;font-size:15px;background-color:#fa9805;color:white;cursor:pointer";
                }
                else{
                    $style = "";
                }
                 echo "<li style='cursor:pointer' ><a class='post-page' style='{$style}' id=$i>$i</a></li>";
             }
             echo "</ul>";
             ?>
            </div>

