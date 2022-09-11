<?php include '../../process/db.php'; 
session_start();
include '../../process/secure.php';
?>
<!doctype html>
<html lang="en">

<head>
    <title>Approve Members</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Manage Players</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Manage Room <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <a name="" id="" class="btn btn-primary mr-2" href="../../process/logout.php" role="button">Logout</a>
        <a name="" id="" class="btn btn-danger mr-2" href="../deleteMorning/index.php" role="button">Delete Day Players</a>
        <a name="" id="" class="btn btn-danger mr-2" href="../deleteEvening/index.php" role="button">Delete Night Players</a>
        <a name="" id="" class="btn btn-success mr-2" href="../manage/changeloop.php" role="button">Change time</a>
        <a name="" id="" class="btn btn-light mr-2" href="../addentry/index.php" role="button">View/Hide Add Entry</a>
        <a name="" id="" class="btn btn-primary mr-2" href="../activetournament/index.php" role="button">View/Hide Active Tournament</a>
    </div>
</nav>

<?php
    $idquery = "SELECT * FROM roomid where id = '1'";
    $idres = mysqli_query($conn,$idquery);
    $room = $idres->fetch_assoc();
?>

<?php
if(isset($_POST['submit']))
{
    $morningid = $_POST['morningid'];
    $morningpass = $_POST['morningpass'];
    $eveningid = $_POST['eveningid'];
    $eveningpass = $_POST['eveningpass'];
    $updatequery = "UPDATE roomid set morningid = '$morningid', morningpass = '$morningpass', eveningid = '$eveningid' , eveningpass = '$eveningpass' WHERE id = 1";
    $updateresult = mysqli_query($conn,$updatequery);
    echo header('Location: index.php?msg=updatesuccess');
}
?>



<body>
<div class="container d-flex justify-content-center mt-5" style="height: 78vh;">
        <div class="form-group">
            <form action="#" method="post">
                <label for="morningid">Day ID</label>
                <input type="text" class="form-control" name="morningid" id="" aria-describedby="emailHelpId" placeholder="<?php echo $room['morningid']; ?>">
                <br>
                <label for="morningpass">Day Pass</label>
                <input type="text" class="form-control" name="morningpass" id="" aria-describedby="emailHelpId" placeholder="<?php echo $room['morningpass']; ?>">
                <br>
                <label for="eveningid">Evening ID</label>
                <input type="text" class="form-control" name="eveningid" id="" aria-describedby="emailHelpId" placeholder="<?php echo $room['eveningid']; ?>">
                <br>
                <label for="eveningpass">Evening Pass</label>
                <input type="text" class="form-control" name="eveningpass" id="" aria-describedby="emailHelpId" placeholder="<?php echo $room['eveningpass']; ?>">
                <br>
                <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
    <?php include '../../footer.php'; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>