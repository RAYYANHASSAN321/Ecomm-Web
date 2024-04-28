<?php
include 'conn.php';

$id =  $_GET['id'];

$query = "DELETE FROM category WHERE c_id = $id";
$runn =  mysqli_query($conn , $query);

if($runn){


    echo "
    <script>
        alert('Record deleted!');
        window.location.href='category.php'
    </script>

    ";
    // header('location:category.php');

}


?>