<?php
include_once "connection.php";
if(isset($_SESSION['username']) && (isset($_SESSION['role']) && $_SESSION['role'] == 1)){?>
  <div class="text-center">
   <h1><a href="logout.php"> uitloggen</a></h1> <h2><a href="admin.php">Terug</a></h2>
   </div>
   <?php
}  else {
    header("location: login.php");
} 

$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
//  WHERE TYPE = "male" (voor welke tabel)
//$stmt->debugDumpParams();

$result = $stmt->fetchAll();
?>
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
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">username</th>
      <th scope="col">password</th>
      <th scope="col">role</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
  <?php
foreach($result as $res){ ?>
    <tr>
      <td><?php echo $res['ID'];?></td>
      <td><?php echo $res['username'];?></td>
      <td><?php echo $res['password'];?></td>
      <td><?php echo $res['role'];?></td>
      <td> <a href="deleteuser.php?id=<?php echo $res["ID"];?>">delete</a> </td>
    </tr>
    <?php
}
?>
  <td> <a href="insertuser.php">toevoegen</a></td>
  </tbody>
</table>
</body>
</html>