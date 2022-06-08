<?php
include 'connection.php';
if(isset($_SESSION['username']) && (isset($_SESSION['role']) && $_SESSION['role'] == 1)){
    //echo "welcome " . $_SESSION['username'];
} else {
    header("location: admin.php");
}

$sql = "DELETE FROM users WHERE ID = :id;
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    header("location: gebruikers.php");