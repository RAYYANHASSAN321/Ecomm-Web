<?php
include 'db_header.php';
if(isset($_GET['submit'])){

$name = $_GET['cname'];
$contact = $_GET['ccontact'];
$email = $_GET['cemail'];
$password = $_GET['cpassword'];
$address = $_GET['caddress'];

$query = "INSERT INTO customer(c_name, c_contact, c_email, c_password, c_address) VALUES ('$name','$contact','
$email','$password','$address')";
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

<h1 class="text-center">Customer </h1>

<form class="my-4" method="POST">

<div class="col-6 m-auto py-2" >
<input class="form-control" type="text" require name="cname" placeholder="Enter name...">
</div>



<div class="col-6 m-auto py-2" >
<input class="form-control" type="text" require name="ccontact" placeholder="Enter contact...">
</div>


<div class="col-6 m-auto py-2" >
<input class="form-control" type="email" require name="cemail" placeholder="Enter email...">
</div>


<div class="col-6 m-auto py-2" >
<input class="form-control" type="text" require name="cpassword" placeholder="Enter password...">
</div>


<div class="col-6 m-auto py-2" >
<input class="form-control" type="text" require name="caddress" placeholder="Enter address...">
</div>



<div class="col-6 m-auto py-2" >
<input class="btn btn-info m-auto" type="submit"  name="submit" value="Submit">
</div>

</form>

<table class="table text-center">
<thead>
    <tr>
        <th>S No</th>
        <th>Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Address</th>
       
        <th>Action</th>
    </tr>
</thead>

<tbody>

<?php
$query = "SELECT * FROM customer";
$runn =  mysqli_query($conn , $query);
$sno = 0;
if(mysqli_num_rows($runn)){
while($rows =  mysqli_fetch_array($runn)){
?>
    <tr>
        <td><?php echo  ++$sno;?></td>
        <td><?php echo $rows['c_name'] ?></td>
        <td><?php echo $rows['c_contact'] ?></td>
        <td><?php echo $rows['c_email'] ?></td>
        <td><?php echo $rows['c_address'] ?></td>

        <td>
            <a class="btn btn-danger" href="customer_delete.php?id=<?php echo $rows['c_id']?>">Delete</a> 
            <a class="btn btn-success" href="customer_update.php?id=<?php echo $rows['c_id']?>">Update</a>

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