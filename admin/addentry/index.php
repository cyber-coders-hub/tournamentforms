<?php
include '../../process/db.php'; 
session_start();
include '../../process/secure.php';
$select = "SELECT * FROM showhide WHERE id ='1'";
$selectres = mysqli_query($conn,$select);
$check = $selectres->fetch_assoc();
if($check['addentry']==0)
{
    $update = "UPDATE showhide set addentry = '1' WHERE id = '1'";
    $updateres = mysqli_query($conn,$update);
    echo header('Location: ../manage/index.php?msg=addentryshowed ');
}
elseif ($check['addentry']==1) {
    $update = "UPDATE showhide set addentry = '0' WHERE id = '1'";
    $updateres = mysqli_query($conn,$update);
    echo header('Location: ../manage/index.php?msg=addentryhide');
}

?>