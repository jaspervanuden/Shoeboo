<?php
include_once "connection.php";
if(isset($_SESSION['username'])){?>
<div class="text-center">
   <h1><a href="logout.php"> uitloggen</a></h1> <h2><a href="admin.php">Terug</a></h2>
   </div>
   <?php
}  else {
    header("location: login.php");
} 

$sql = "SELECT * FROM shoes";
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
      <th scope="col">name</th>
      <th scope="col">prijs</th>
      <th scope="col">gender</th>
      <th scope="col">edit</th>
      <th scope="col">delete</th>
      <th> <a href="insert.php">toevoegen</a> </th>
    </tr>
  </thead>
  <tbody>
  <?php
foreach($result as $res){ ?>
    <tr>
      <td><?php echo $res['ID'];?></td>
      <td><?php echo $res['name'];?></td>
      <td><?php echo $res['price'];?></td>
      <td><?php echo $res['gen'];?></td>
      <td> <a href="edit.php?id=<?php echo $res["ID"];?>">edit</a> </td>
      <td> <a href="delete.php?id=<?php echo $res["ID"];?>">delete</a> </td>
    </tr>
    <?php
}
?>
  </tbody>
</table>
</body>
</html>