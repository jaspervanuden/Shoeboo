<?php

  include_once "connection.php";

  if(isset($_SESSION['username']) && (isset($_SESSION['role']) && $_SESSION['role'] == 1)){?>
    <p><?php echo "welcome " . $_SESSION['username']; ?></p>
    <?php
  }  else {
      header("location: login.php");
  }

  if(isset($_POST["submit"])){

    $sql = "INSERT INTO users
              (username, password, role)
              VALUES
              (:username, :password, :role )
      ";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':username', $_POST['username']);
      $stmt->bindParam(':password', $_POST['password']);
      $stmt->execute();
      header("location: login.php");
  }
?>


<form action="" method="post">
username<input type="text" name="username" id=""><br />
password<input type="text" name="password" id=""><br />
role <input type="text" name="role" id="" ><br />
<input type="submit" value="toevoegen" name="submit">
</form>

