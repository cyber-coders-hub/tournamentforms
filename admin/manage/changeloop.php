<?php
include '../../process/db.php'; 
session_start();
include '../../process/secure.php';
$select = "SELECT * FROM managetime WHERE id ='1'";
$selectres = mysqli_query($conn,$select);
$check = $selectres->fetch_assoc();
if($check['timeloop']==6)
{
    $update = "UPDATE managetime set timeloop = '8' WHERE id = '1'";
    $updateres = mysqli_query($conn,$update);
    echo header('Location: index.php?msg=loopupdatedto8 ');
}
elseif ($check['timeloop']==8) {
    $update = "UPDATE managetime set timeloop = '6' WHERE id = '1'";
    $updateres = mysqli_query($conn,$update);
    echo header('Location: index.php?msg=loopupdatedto6');
}

?>