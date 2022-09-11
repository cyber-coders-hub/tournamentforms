<?php include '../process/db.php'; ?>
<?php error_reporting(0); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Morning | 24BroYT Official</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="navbar-brand">Tournament Form</div>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Day Time <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../evening/index.php">Night Time</a>
                </li>
                <li class="nav-item  active">
                    <a class="nav-link" href="roomid/">View Room ID/PSW</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php
    $idquery = "SELECT * FROM roomid where id = '1'";
    $idres = mysqli_query($conn,$idquery);
    $room = $idres->fetch_assoc();
    ?>
    <?php
    $check = 0;
    if(isset($_POST['submit']))
    {
        $number = $_POST['number'];
        $selectQuery = "SELECT * FROM morningPlayers WHERE number = '$number' AND status = '1'";
        $selectResult = mysqli_query($conn,$selectQuery);
        $row = $selectResult->fetch_assoc();
        if($row['number'] == $number)
        {
            $check = 1;
        }
    }
    ?>
    <div class="text-center font-weight-bold text-primary mt-5">Day Time</div>
    <div class="container d-flex justify-content-center">
        <div class="form-group">
            <form action="#" method="post">
                <label for="number">Enter your registered number :</label>
                <input type="number" class="form-control" name="number" id="" aria-describedby="emailHelpId" placeholder="Registered number.">
                <br>
                <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
    <?php 
    if($check==1)
    {
    ?>
    <div class="text-center mt-5">Room id : <?php echo $room['morningid']; ?></div>
    <div class="text-center">Room password : <?php echo $room['morningpass']; ?></div>
    <?php } ?>

    <?php
    $checkevening = 0;
    if(isset($_POST['submitnight']))
    {
        $number = $_POST['number'];
        $selectQuery = "SELECT * FROM eveningPlayers WHERE number = '$number' AND status = '1'";
        $selectResult = mysqli_query($conn,$selectQuery);
        $row = $selectResult->fetch_assoc();
        if($row['number'] == $number)
        {
            $checkevening = 1;
        }
    }
    ?>
    <div class="text-center font-weight-bold text-primary mt-5">Night Time</div>
    <div class="container d-flex justify-content-center" style="height: 47vh;">
        <div class="form-group">
            <form action="#" method="post">
                <label for="number">Enter your registered number :</label>
                <input type="number" class="form-control" name="number" id="" aria-describedby="emailHelpId" placeholder="Registered number.">
                <br>
                <button type="submit" name="submitnight" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
    <?php 
    if($checkevening==1)
    {
    ?>
    <div class="text-center mt-5">Room id : <?php echo $room['eveningid']; ?></div>
    <div class="text-center">Room password : <?php echo $room['eveningpass']; ?></div>
    <?php } ?>


    <?php include '../footer.php'; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>