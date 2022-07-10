<?php
include "config.php";
if(isset($_GET['subscribe'])){
    $e=$_GET['email'];
    $sql="INSERT INTO subscriber(email) VALUES ('$e')";
    $res=mysqli_query($conn,$sql) or die("Failed to Subscribe");
    header('Location:/osqr/');
}
?>