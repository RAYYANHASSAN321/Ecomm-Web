<?php
include 'conn.php';
session_start();

// session_destroy();

if($id = $_SESSION['dbLogin']){

    $query = "select * from admin where a_id = $id";
    $runn=  mysqli_query($conn , $query);

    $rows = mysqli_fetch_array($runn);

    $name  = $rows['a_name'];

}
else{

    header('location:signin.php');

}

?>