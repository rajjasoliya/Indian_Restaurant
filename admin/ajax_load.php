<?PHP include "config.php";

$limit2  = 2;
if (isset($_POST['page'])) {
    $page = $_POST['page'];
} else {
    $page = 0;
}
// $offset2 = ($page - 1) ;
$query6 = "SELECT * FROM post LIMIT {$page},$limit2";
$result6 = mysqli_query($connection, $query6) or die("Couldn't connect to Query'");
if (mysqli_num_rows($result6) > 0) {
    while ($row6 = mysqli_fetch_array($result6)) {
        $lid = $row6['pid'];
?>
        <div class="div11" style="display:flex;flex-direction:column;flex-wrap:wrap;max-width:100%">
            <img class="div11img" src="img/<?PHP echo $row6['pimage']; ?>">
            <div class="overlay0">
                <h3><?PHP echo $row6['pname']; ?></h3>
                <p><?PHP echo $row6['pdesc']; ?></p>
                <h4 class="price1">$<?PHP echo $row6['pprice']; ?></h4>
                <div><a class="add-to-cart" href="add-to-cart.php?pid=<?PHP echo $row6['pid']; ?>">Add to Cart</a></div>
            </div>
        </div>

      

<?PHP  }
echo "
<button id=$lid class='load_more'>Load More</button>
";
} 
else {
    echo "";
}
?>