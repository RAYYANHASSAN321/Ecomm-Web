<?php
include 'db_header.php';
//--------------To fetch data 
$id = $_GET['id'];
$query = "SELECT * FROM category WHERE c_id = $id";
$runn =  mysqli_query($conn , $query);
$data = mysqli_fetch_array($runn);


//---------------To update data

if(isset($_POST['submit'])){

    $cname = $_POST['cname'];
    $queryy = "UPDATE category SET c_name = '$cname' WHERE c_id = $id";
    $runnn =  mysqli_query($conn , $queryy);

    if($runnn){

        echo "
        
        <script>
            alert('Record Updated!');
            window.location.href ='category.php';
        </script>

        ";

    }
}
?>


<h1 class="text-center">Category Update</h1>

<form class="my-4" method="POST">

<div class="col-6 m-auto py-2" >
<input class="form-control" type="text" require name="cname" value="<?php echo $data['c_name']?>">
</div>


<div class="col-6 m-auto py-2" >
<input class="btn btn-info m-auto" type="submit"  name="submit" value="Update">
</div>

</form>


<?php
include 'db_footer.php'
?>