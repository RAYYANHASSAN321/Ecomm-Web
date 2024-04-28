<?php
include 'web_header.php';

$id = $_GET['id'];
$query = "select * from product where p_id = $id";
$run =  mysqli_query($conn , $query);
$row =  mysqli_fetch_array($run);

?>

<div class="row px-1 py-3">
    <div class="col-6">
        <img  src="<?php echo "img/".$row['p_image']?>" width="500" height="500" alt="">
    </div>
<div class="col-6">
        <h3><?php echo $row['p_name']?></h3>
        <h5><?php echo $row['p_price']?></h5>

        <form action="addtocart.php" method="POST">
            <input class="form-control col-3 my-3" require type="number" name="pro_quantity">
            <input hidden type="number" value="<?php echo $row['p_id']?>" name="pro_id">
            <input hidden type="text" value="<?php echo $row['p_name']?>" name="pro_name">
            <input hidden type="number" value="<?php echo $row['p_price']?>" name="pro_price">
            <input hidden type="text" value="<?php echo $row['p_image']?>" name="pro_image">
            <input class="btn btn-info" type="submit" name="submit" value="Add to cart">
        </form>
</div>
</div>


<?php
include 'web_footer.php';
?>