<?php

  include_once "connection.php";

  if(isset($_SESSION['username'])){?>
    <p><?php echo "welcome " . $_SESSION['username']; ?></p>
    <?php
  }  else {
      header("location: login.php");
  }


  if(isset($_FILES["fileToUpload"])){

    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    $uploadsucceeded = false;
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        $uploadsucceeded = true;
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  }

  if(isset($_POST["submit"])){

    $sql = "INSERT INTO shoes
              (name, price, img, gen)
              VALUES
              (:name, :price, :img, :gen)
      ";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':name', $_POST['name']);
      $stmt->bindParam(':price', $_POST['price']);
      $stmt->bindParam(':img', $_FILES['fileToUpload']['name']);
      $stmt->bindParam(':gen', $_POST['gen']);
      $stmt->execute();
      header("location: admin.php");
  }
?>


<form action="" method="post" enctype="multipart/form-data">
naam<input type="text" name="name" id=""><br />
prijs<input type="text" name="price" id=""><br />
foto uploaden<input type="file" name="fileToUpload" id="fileToUpload"><br />
gen <input type="text" name="gen" id="" ><br />
<input type="submit" value="toevoegen" name="submit">
</form>

