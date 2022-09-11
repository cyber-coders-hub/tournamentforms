<?php
include '../../process/db.php';
session_start();
include '../../process/secure.php';
$deletequery = "DELETE FROM morningPlayers";
$deleteresult = mysqli_query($conn,$deletequery);
echo header('Location: ../manage/index.php?msg=tabledropped');
?>
