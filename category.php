<?php
include 'db_header.php';

if(isset($_POST['submit'])){

    $c_name = $_POST['cname'];

    $query = "INSERT INTO category (c_name) VALUES ('$c_name')";
    $runn =   mysqli_query($conn , $query);

    if($runn){

        echo "
        <script>
            alert('Record inserted!');
        </script>
        ";
    }
}

?>

<h1 class="text-center">Category </h1>

<form class="my-4" method="POST">

<div class="col-6 m-auto py-2" >
<input class="form-control" type="text" require name="cname" placeholder="Enter category name...">
</div>


<div class="col-6 m-auto py-2" >
<input class="btn btn-info m-auto" type="submit"  name="submit" value="Submit">
</div>

</form>

<table class="table text-center">
<thead>
    <tr>
        <th>S No</th>
        <th>Category Name</th>
        <th>Action</th>
    </tr>
</thead>

<tbody>
<?php
$query = "SELECT * FROM category";
$runn =  mysqli_query($conn , $query);
// echo  mysqli_num_rows($runn);
// print_r(mysqli_fetch_array($runn))
// $data =  mysqli_fetch_array($runn);
// echo "<br>"; 
// echo $data['c_name'];
$sno = 0;
if(mysqli_num_rows($runn)){
while($rows =  mysqli_fetch_array($runn)){
?>
    <tr>
        <td><?php echo  ++$sno;?></td>
        <td><?php echo $rows['c_name'] ?></td>
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