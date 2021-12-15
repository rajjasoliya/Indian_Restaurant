<?PHP include "config.php";

         $query5 = "SELECT * FROM category";
         $result5 = mysqli_query($connection, $query5) or die("Couldn't connect to Query'");
         if(mysqli_num_rows($result5) > 0){
             while($row5 = mysqli_fetch_array($result5)){
         ?>
             <a id=<?PHP echo $row5['cid']; ?> class="break"><?PHP echo $row5['cname']; ?></a>
             <?PHP   }
         } ?>
         