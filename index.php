<?php
include 'web_header.php';
?>
<div class="row px-1 py-3">

<?php

$query = "SELECT * FROM product";
$runn =  mysqli_query($conn , $query);

while($rowss =  mysqli_fetch_array($runn)){
?>

<div class="col-3 text-center">
<img  src="<?php echo "img/".$rowss['p_image'] ?>"    width="250" height="300" alt="">
<h3><?php  echo $rowss['p_name'] ?></h3>
<h5><?php echo $rowss['p_price']?></h5>
<a class="btn btn-primary" href="single_product.php?id=<?php echo $rowss['p_id']?>">View</a>

</div>

<?php
}
?>

</div>
<?php
include 'web_footer.php';
?>