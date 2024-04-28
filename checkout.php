<?php
include 'conn.php';
session_start();

if(isset($_POST['checkout'])){

    $name = $_POST['c_name'];
    $contact = $_POST['c_contact'];
    $email = $_POST['c_email'];
    $address = $_POST['c_address'];
// echo $name . $contact . $email . $address;

$query = "INSERT into order_manager (pname , pcontact , pemail , paddress) VALUES ('$name' , '$contact' , '$email' , '$address')";

 $runn =  mysqli_query($conn , $query);

 if($runn){
       
    $order_id  =  mysqli_insert_id($conn);

    $query2 = "INSERT INTO order_details (order_id , pro_name , price ,quantity) VALUES (? , ? , ? , ? )";
    $runn2 = mysqli_prepare($conn , $query2);

    if($runn2){

        mysqli_stmt_bind_param($runn2 , 'isii', $order_id , $pname , $pprice , $pquantity);
        foreach($_SESSION['cart'] as $key => $value){
            $pname = $value['pname'];
            $pprice = $value['pprice'];
            $pquantity = $value['pquantity'];
        
            mysqli_stmt_execute($runn2);

        }

    unset($_SESSION['cart']);
    echo "
    <script>
            alert('Order Recieved!');
            window.location.href='index.php';
    </script>

    ";

    }
 }
}
?>