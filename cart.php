<?php
include 'web_header.php';
session_start();
?>

<h1 class="text-center">Cart</h1>

<div class="row py-3 px-1">
 <!-- table div start  -->
<div class="col-8">
    <table class="table px-1 py-3">
    <thead>
        <tr>
            <th>S No</th>
            <th>Image</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>

        </tr>
    </thead>
<tbody>
<?php
if(isset($_SESSION['cart'])){

foreach($_SESSION['cart'] as $key => $value){
    $sr = $key + 1
?>

<tr>
<td><?php echo $sr?></td>
<td><img src="<?php echo "img/".$value['pimage']?>" width="50" height="50"alt=""></td>
<td><?php echo $value['pname']?></td>
<td><?php echo $value['pprice']?></td>
<td>
<form action="addtocart.php" method="POST">
<input type="number" class="quantity" name="mod_qauntity" onchang="this.form.submit" value="<?php echo $value['pquantity']?>">
<input type="hidden" name="product_name" value="<?php echo $value['pname']?>">
<input type="hidden" name="pprice" class="product_price" value="<?php echo $value['pprice']?>">
</form>
</td>
<td class="total"></td>
<td>
<form action="addtocart.php" method="POST">
<input type="hidden" name="product_name" value="<?php echo $value['pname']?>">    
<button name="remove_item" class="btn btn-danger">Remove</button>
</form>
</td>
</tr>

<?php 

}
}
?>
</tbody>
    </table>
</div>
 <!-- table div end  -->

<div class="col-4">
    <h1>Grand Total</h1>
    <h5 id="grandtotal">0</h5>

    <form action="checkout.php" method="POST">
        <input class="form-control col-3 my-3" type="text" required placeholder="Enter your name..." name="c_name">
        <input class="form-control col-3 my-3" type="text" required placeholder="Enter your contact..." name="c_contact">
        <input class="form-control col-3 my-3" type="email" required placeholder="Enter your email..." name="c_email">
        <input class="form-control col-3 my-3" type="text" required placeholder="Enter your address..." name="c_address">

        <input class="btn btn-info" type="submit" value="Checkout" name="checkout">
    </form>
</div>
</div>


<script>

var gt = 0;
    var iquantity = document.getElementsByClassName('quantity');
    var iprice = document.getElementsByClassName('product_price');
    var itotal = document.getElementsByClassName('total');
    var grandTotal = document.getElementById('grandtotal');

    function subtotal(){

        for(i = 0; i < iquantity.length; i++){

            itotal[i].innerHTML = (iprice[i].value * iquantity[i].value);
            gt = gt + (iprice[i].value * iquantity[i].value);

        }
        grandTotal.innerHTML = gt;

    }

    subtotal();
</script>



<?php
include 'web_footer.php';

?>