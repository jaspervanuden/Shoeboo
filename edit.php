<?php
include_once "connection.php";
if(isset($_SESSION['username'])){?>
   <p><?php echo "welcome " . $_SESSION['username']; ?></p>
   <?php
}  else {
    header("location: login.php");
}

//var_dump($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM shoes WHERE ID = :id");
$stmt->execute(['id' => $_GET['id']]);
$data = $stmt->fetch();

if(isset($_POST["edit"])){
    $sql = "UPDATE shoes SET
                name = :name,
                price = :price,
                img = :img,
                gen = :gen
                WHERE ID = :id
                ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':price', $_POST['price']);
        $stmt->bindParam(':img', $_POST['img']);
        $stmt->bindParam(':gen', $_POST['gen']);
        $stmt->bindParam(':id', $data['ID']);
        $stmt->execute();
        header("location: database.php");

}

?>
<form action="" method="post"> 
    titel <input type="text" name="name" id="" value="<?php echo $data['name']?>"><br />
    prijs <input type="text" name="price" id="" value="<?php echo $data['price']?>"><br />
    img <input type="text" name="img" id="" value="<?php echo $data['img']?>"><br />
    gen <input type="text" name="gen" id="" value="<?php echo $data['gen']?>"><br />
    <input type="submit" value="edit" name="edit">
</form>
