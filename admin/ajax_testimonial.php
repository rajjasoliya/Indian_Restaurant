<?PHP include "config.php";
$limit3 = 1;
if (isset($_POST['page_no'])) {
    $page_no = $_POST['page_no'];
} else {
    $page_no = 1;
}
$offset3 = ($page_no - 1) * $limit3;
$query8 = "SELECT * FROM testimonial LIMIT $offset3,$limit3";
$result8 = mysqli_query($connection, $query8) or die("Couldn't connect to Query'");
if (mysqli_num_rows($result8) > 0) {
    while ($row8 = mysqli_fetch_array($result8)) {
?>

        <p><?PHP echo $row8['tdesc']; ?></p>
        <img class="that" src="img/<?PHP echo $row8['timage']; ?>">
        <h3><?PHP echo $row8['tname']; ?></h3>
        <h5><?PHP echo $row8['trole']; ?></h5>
<?PHP
    }
}
$query9 = "SELECT * FROM testimonial";
$result9 = mysqli_query($connection, $query9) or die("Couldn't connect to Query'");
$total_records4 = mysqli_num_rows($result9);
$total_page4 = ceil($total_records4 / $limit3);
if ($page_no > 1) {
    
    ?><a class='test_class' id=<?PHP echo $page_no-1 ?>><i style="cursor:pointer" class='fa fa-arrow-circle-left' aria-hidden='true'></i></a><?PHP
}
if ($page_no < $total_page4) {
    
    ?><a class='test_class' id=<?PHP echo $page_no+1 ?>><i style="cursor:pointer" class='fa fa-arrow-circle-right' aria-hidden='true'></i></a><?PHP
}
?>