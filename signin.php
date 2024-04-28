<?php
include 'conn.php';
session_start();
if(isset($_POST['signin'])){

    $email = $_POST['uemail'];
    $password = $_POST['upass'];

    $query= "SELECT * FROM admin WHERE a_email = '$email' && a_password = '$password'";

    $runn =  mysqli_query($conn , $query);

  if(mysqli_num_rows($runn) > 0){

    $data = mysqli_fetch_array($runn);

    $_SESSION['dbLogin'] = $data['a_id'];
    
    header('location:category.php');

  }
  else{
echo "
<script>
alert('Wrong username or password!');

</script>

";

  }
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  
  <div class="col-4 m-auto">

  <h1 class="text-center">Signin</h1>
  <form action="" method="POST">

  <div class="py-2">
    <input type="email" class="form-control" Placeholder="Enter your email..." name="uemail">
</div>


<div class="py-2">
    <input type="text" class="form-control" Placeholder="Enter your password..." name="upass">
</div>

<div class="m-auto">
    <input type="submit" class="btn btn-info m-auto" value="Submit" name="signin">
</div>

</form>


  </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>