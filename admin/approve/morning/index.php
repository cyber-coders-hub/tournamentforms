<?php
include '../../../process/db.php';
session_start();
include '../../../process/secure.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $updatequery = "UPDATE morningPlayers set status = '1' WHERE id = '$id'";
    $updateresult = mysqli_query($conn,$updatequery);
    echo header('Location: ../../manage/index.php?msg=approved');
}
?>