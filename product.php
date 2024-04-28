<?php
include 'db_header.php';

if(isset($_POST['submit'])){

$name = $_POST['pname'];
$price = $_POST['pprice'];
$quantity = $_POST['pquantity'];
$category = $_POST['pcategory'];

// print_r($_FILES['pimage']);
// echo $img_name;
// echo $img_path;


$img_name = $_FILES['pimage']['name'];
$img_path = $_FILES['pimage']['tmp_name'];

//--------To move image from temporary to permanent path---------
move_uploaded_file($img_path , "img/" . $img_name);

$query = "INSERT INTO product (p_name , p_price , p_quantity , p_category , p_image) VALUES ('$name' , $price  , $quantity  , $category  , '$img_name')";

$run =  mysqli_query($conn , $query);

if($run){

    echo "
    <script>
    alert('Record Inserted!')
    </script>
    ";
}

}

?>

<h1 class="text-center">Product </h1>
 <!-- Must add this attribute on form tag in which you are selecting a file type data enctype="multipart/form-data" -->
<form class="my-4" method="POST" enctype="multipart/form-data">

<div class="col-6 m-auto py-2" >
<input class="form-control" type="text" require name="pname" placeholder="Enter product name...">
</div>

<div class="col-6 m-auto py-2" >
<input class="form-control" type="number" require name="pprice" >
</div>

<div class="col-6 m-auto py-2" >
<input class="form-control" type="number" require name="pquantity" >
</div>

<div class="col-6 m-auto py-2" >
<input class="form-control" type="file" require name="pimage">
</div>

<div class="col-6 m-auto py-2" >

<select class="form-control" name="pcategory" >
<?php
$queryy = "select * from category";
$rowsss=  mysqli_query($conn , $queryy); 

while($data =  mysqli_fetch_array($rowsss)){

?>
<option value="<?php echo $data['c_id']?>"><?php echo $data['c_name']?></option>

<?php
}
?>

</select>
</div>

<div class="col-6 m-auto py-2" >
<input class="btn btn-info m-auto" type="submit"  name="submit" value="Submit">
</div>

</form>


 <!-- Display product start  -->
 <table class="table text-center">
<thead>
    <tr>
        <th>S No</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Product Quantity</th>
        <th>Product Category</th>
        <th>Product Image</th>

        <th>Action</th>
    </tr>
</thead>

<tbody>
<?php
$query = "SELECT * from product INNER JOIN category on product.p_category = category.c_id";
$runn =  mysqli_query($conn , $query);
$sno = 0;
if(mysqli_num_rows($runn)){
while($rows =  mysqli_fetch_array($runn)){
?>
    <tr>
        <td><?php echo  ++$sno;?></td>
        <td><?php echo $rows['p_name'] ?></td>
        <td><?php echo $rows['p_price'] ?></td>
        <td><?php echo $rows['p_quantity'] ?></td>
        <td><?php echo $rows['c_name'] ?></td>
        <td><img src="<?php echo "img/" . $rows['p_image'] ?>" width="50" height="50" alt=""></td>

        <td>
            <a class="btn btn-danger" href="category_delete.php?id=<?php echo $rows['c_id']?>">Delete</a> 
            <a class="btn btn-success" href="category_update.php?id=<?php echo $rows['c_id']?>">Update</a>

        </td>
    </tr>

    <?php 
    
}

}
    ?>
</tbody>

</table>



<?php
include 'db_footer.php'
?>