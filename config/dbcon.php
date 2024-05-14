<?php
$conn=mysqli_connect("localhost", "root", "Aditya1&", "project");
if(!$conn)
{
    header("Location: ../errors/db.php");
    die(mysqlhi_connect_error($conn));
}
?>