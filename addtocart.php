<?php
include 'conn.php';
session_start();
// session_destroy();

//------------------To add product in cart  start

if(isset($_POST['submit'])){

    $pid = $_POST['pro_id'] ;
    $pname = $_POST['pro_name'] ;
    $pprice = $_POST['pro_price'] ;
    $pquantity = $_POST['pro_quantity'] ;
    $pimage = $_POST['pro_image'] ;

if(isset($_SESSION['cart'])){

    $pro_name = array_column($_SESSION['cart'] , 'pname');
    if(in_array($pname , $pro_name )){

        echo "
        <script>
        alert('Product already added!');
        window.location.href='index.php'
        </script>
        ";
    }
else{

  $count = count($_SESSION['cart']);
    $_SESSION['cart'][$count] = array('pname' => $pname , 'pprice' => $pprice , 'pquantity' => $pquantity , 'pimage' => $pimage);
    // print_r($_SESSION['cart']);

    
    echo "
    <script>
    alert('Product added!');
    window.location.href='cart.php'
    </script>
    ";
}
}
else{
    $_SESSION['cart'][0] = array('pname' => $pname , 'pprice' => $pprice , 'pquantity' => $pquantity , 'pimage' => $pimage);
    // print_r($_SESSION['cart']);
    echo "
    <script>
    alert('Product added!');
    window.location.href='cart.php'
    </script>
    ";
}
}
//------------------To add product in cart  end


//------------------To remove product from cart  start

if(isset($_POST['remove_item'])){

    $pname = $_POST['product_name'];
    foreach($_SESSION['cart'] as $key => $value){
        if($value['pname'] == $pname){

            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            echo "
            <script>
            alert('product removed!');
            window.location.href='cart.php';
            </script>
            ";
        }
    }
}

//------------------To remove product from cart  end



//------------------To update product quantity in cart start

if(isset($_POST['mod_qauntity'])){

 $p_name = $_POST['product_name'];
    foreach($_SESSION['cart'] as $key => $value){
        if($value['pname'] == $p_name){

            $_SESSION['cart'][$key]['pquantity'] = $_POST['mod_qauntity'];

            echo"
            <script>
            alert('Quantity changed!');
            window.location.href='cart.php'
            </script>

            ";
        }
    }
}

//------------------To update product quantity in cart  end

?>