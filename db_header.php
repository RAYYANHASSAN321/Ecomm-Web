<?php

include 'conn.php';
include 'signin_session.php';
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


<div class="row">

<!-- Sidebar  -->

<div class="col-3 py-2 text-center text-light" style="background-color: #373a3b">
<h1>Dashboard</h1>
<h4><?php echo $name;?></h4>
<ul class="list-unstyled">
<li class="py-1"><a class="text-light text-decoration-none" href="category.php">Category</a></li>
<li class="py-1"><a class="text-light text-decoration-none" href="product.php">Product</a></li>
<li class="py-1"><a class="text-light text-decoration-none" href="customer.php">Customer</a></li>
<li class="py-1"><a class="btn btn-secondary" href="logout.php">Logout</a></li>

</ul>
</div>

<!-- dashboard start  -->

<div class="col-9 text-light py-2 px-2" style="background-color: #000000">







