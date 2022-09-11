<?php 
if(isset($_SESSION['id'])){

}
else{
    echo header('Location: /manageTournament/admin/index.php');
}
?>