<?php
include_once "connection.php";
if(isset($_SESSION['username'])){?>
<div class="text-center">
   <h1><?php echo "welcome " . $_SESSION['username']; ?> <a href="logout.php"> uitloggen</a></h1>
   </div>
   <?php
}  else {
    header("location: login.php");
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"/>
      <link rel="stylesheet" href="style/style.css">    <title>Document</title>
</head>
<body>
<body>
<header class="bg-secondary py-5">
      <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <div class="centered">
            <button type="button" class="btn btn-primary btn-lg">database</button>
        <button type="button" class="btn btn-secondary btn-lg">bestellingen</button>
            </div>
          </div>
        </div>
      </div>
    </header>
  <div class="container">
      <div class="justify-content-center">
        <button type="button" class="btn btn-primary btn-lg">database</button>
        <button type="button" class="btn btn-secondary btn-lg">bestellingen</button>
      </div>
  </div>
</body>
</html>