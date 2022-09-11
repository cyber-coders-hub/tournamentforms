<?php
include '../../process/db.php';
session_start();
include '../../process/secure.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $updatequery = "DELETE FROM notice WHERE id = '$id'";
    $updateresult = mysqli_query($conn,$updatequery);
    echo header('Location: index.php?msg=deletesuccess');
}
?>