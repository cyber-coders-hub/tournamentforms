<?php include '../process/db.php'; ?>
<?php error_reporting(0); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Evening | 24BroYT Official</title>
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
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Night Time</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../roomid/">View Room ID/PSW</a>
                </li>
            </ul>
            <?php
            $showhide = "SELECT * FROM showhide WHERE id = '1'";
            $showhideres = mysqli_query($conn,$showhide);
            $button = $showhideres->fetch_assoc();
            if($button['addentry']==1)
            {
                ?>
                <button type="button" class="btn btn-primary <?php echo $button['addentry']; ?>" data-toggle="modal" data-target="#modelId">Add Entry</button>
                <?php
            }
            if($button['activetournament']==1)
            {
            ?>
            <a name="" id="" class="btn btn-secondary ml-2 <?php echo $button['activetournament']; ?>" href="<?php echo $button['link']; ?>" role="button">Active Tournament</a>
            <?php } ?>

            <button type="button" class="ml-2 btn btn-success" data-toggle="modal" data-target="#modelId1">Notice</button>
        </div>
      </nav>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $sn = $_POST['sn'];
    $player = $_POST['player'];
    $timeSelect = $_POST['timeSelect'];
    if ($name != "" && $sn != "" && $player != "" && $number != "" && $timeSelect != "") {
        $select_query = "SELECT * FROM eveningPlayers WHERE sn = '$sn' AND player='$player' AND timeSelect = '$timeSelect'";
        $select_result = mysqli_query($conn, $select_query);
        $rows  = mysqli_num_rows($select_result);
        if ($rows <= 0) {
            $add_query = "INSERT INTO eveningPlayers(name,sn,player,number,timeSelect) VALUES('$name','$sn','$player','$number','$timeSelect')";
            $add_result = mysqli_query($conn, $add_query);
?>
<div class=" alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Please wait until your form is approved.</strong>
        </div>

        <script>
            $(".alert").alert();
        </script>

    <?php
        } else {
    ?>
        <div class=" alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Slot Already Filled.</strong>
        </div>

        <script>
            $(".alert").alert();
        </script>
    <?php
        }
    } else {
    ?>
    <div class=" alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>All fields are required.</strong>
    </div>

    <script>
        $(".alert").alert();
    </script>
<?php
    }
}

?>
<div class=" modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add your entry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="sn">Choose S.N.</label>
                            <select class="form-control" name="sn" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="player">Choose your Player no.</label>
                            <select class="form-control" name="player" id="">
                                <option value="1">Player 1</option>
                                <option value="2">Player 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="timeSelect">Choose your time</label>
                            <select class="form-control" name="timeSelect" id="">
                                <option value="06:00 PM - 06:30 PM">06:00 PM - 06:30 PM</option>
                                <option value="06:30 PM - 07:00 PM">06:30 PM - 07:00 PM</option>
                                <option value="07:00 PM - 07:30 PM">07:00 PM - 07:30 PM</option>
                                <option value="07:30 PM - 08:00 PM">07:30 PM - 08:00 PM</option>
                                <option value="08:00 PM - 08:30 PM">08:00 PM - 08:30 PM</option>
                                <option value="08:30 PM - 09:00 PM">08:30 PM - 09:00 PM</option>
                                <option value="09:00 PM - 09:30 PM">09:00 PM - 09:30 PM</option>
                                <option value="09:30 PM - 10:00 PM">09:30 PM - 10:00 PM</option>

                            </select>
                        </div>

                        <label for="number">Enter your Registerd Number</label>
                        <input type="text" class="form-control" name="number" id="" aria-describedby="emailHelpId" placeholder="Enter your Registerd Number">
                        <label for="name">Players ID</label>
                        <input type="text" class="form-control" name="name" id="" aria-describedby="emailHelpId" placeholder="Enter your Players ID">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Add Entry</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center my-5">
    <img style="border-radius:50%;" width="150px" src="../static/img/logo1.png" alt="">
</div>
<div class="mx-4 my-5">
    <div class="font-weight-bold">Tournament held by {{24BroYT}}</div>
    <div>Esewa/Khalti : 9827101710</div>
    <div><span>Entry fee: Rs 50</span>
        <div>1st Price: Rs 400</div><span>2nd Price: Rs 300</span>
    </div>
    <p>Play and win the tournament among 16 players in 30 minutes and get your rewards.</p>

    <div class="font-weight-bold">Details about the Tournament:</div>
    Video link : <a href="https://www.youtube.com/c/YoHoAcademy">https://www.youtube.com/c/YoHoAcademy</a>
    <div>There will be total three matches in the tournament.</div>
    <ul>
        <li>The 1st match is "Pan-Fight" between 8 vs 8 players :<div>{Slot '1,2,3,4,5,6,7,8'} <span class="text-primary font-weight-bold">VS</span> <br>{Slot '9,10,11,12,13,14,15,16'}</div>
        </li>
        <div>(Winning team will be qualified to 2nd match.)</div>
        <li>The 2nd match is "Sniper-Fight" between 4 vs 4 players : <br>{Slot '1,2,3,4' <span class="text-primary font-weight-bold">VS</span> Slot '5,6,7,8'}<br> OR <br> {Slot '9,10,11,12'
            <span class="text-primary font-weight-bold">VS</span> Slot '13,14,15,16'}
        </li>
        <div>(Winning team will be qualified to 3rd or Final match.)</div>
        <li>The 3rd or final match is "M416-Fight" between 2 vs 2 players : <br> {Slot <br>('1,2' <span class="text-primary font-weight-bold">VS</span> '3,4' OR '5,6' <span class="text-primary font-weight-bold">VS</span> '7,8') <br>OR<br> ('9,10' <span class="text-primary font-weight-bold">VS</span> '11,12' OR '13,14' <span class="text-primary font-weight-bold">VS</span> '15,16')}</li>
        <div>(The winning team will be the '1st' and another will be '2nd'.)</div>
        <div>All payment transactions are done by Esewa/Khalti/Mobile Banking.</div>
        <div class="font-weight-bold">Use your strategy to win the game.</div>
    </ul>

    <ul><span class="font-weight-bold">Tournament rules:</span>
        <li>In the 1st match, only Pan and Grenades are allowed to use.</li>
        <li>In the 2nd match, only Snipers, Grenades and Level 3 items are allowed to use.</li>
        <li>In the 3rd match, only M416, Grenades and Level 3 items are allowed to use.</li>
        <li>Matches will be on accurate time, so please be on time.</li>
        <li>If any player become absent then, his/her slot will be given to the viewers.</li>
        <li>If the replaced player won the game then, the entry fee will be refunded and remaining will be
            rewarded to the replaced player. But if he/she doesn't won the game then, the entry will not be
            refunded.</li>
        <li>Hackers/Cheaters are strictly prohibited.</li>
        <li>Group call of Discord/Messenger will be going online during tournament where players can join while
            playing matches. If any player found hacking or suspicious, report can be done in group call.</li>
        <li>Players who paid the entry fee by Esewa/Khalti/Mobile Banking, need to send screenshot of their
            payment transaction detail to get approved by <strong>24BroYT</strong>.</li>
        <li>Winners need to send their winning screenshot, payment transaction detail of Esewa/Khalti/Mobile Banking.</li>
        <li>Winners will get instant payment.</li>
        <li>Be friendly and respect all players.</li>
    </ul>

    <div class="font-weight-bold">Check out the video from the link about how to get entry to fill the form for
        the tournament.</div>
    Video link : <a href="https://www.youtube.com/c/YoHoAcademy">https://www.youtube.com/c/YoHoAcademy</a>
</div>
<div class="font-weight-bold text-center" style="font-size:1.2rem;">SLOTS DEMO</div>
<div class="d-flex justify-content-center">
    <img class="slot" src="../static/img/Slots.png">
</div>
<div class="font-weight-bold text-center" style="font-size:1.2rem; margin-top:5rem;">TIESHEET DEMO</div>
<div class="d-flex justify-content-center">
    <img class="slot" src="../static/img/Tiesheetdemo.png">
</div>
<?php
for ($k = 0; $k < 8; $k++) {
    if ($k == 0) {
        $timestamp = '06:00 PM - 06:30 PM';
    } elseif ($k == 1) {
        $timestamp = '06:30 PM - 07:00 PM';
    } elseif ($k == 2) {
        $timestamp = '07:00 PM - 07:30 PM';
    } elseif ($k == 3) {
        $timestamp = '07:30 PM - 08:00 PM';
    } elseif ($k == 4) {
        $timestamp = '08:00 PM - 08:30 PM';
    } elseif ($k == 5) {
        $timestamp = '08:30 PM - 09:00 PM';
    } elseif ($k == 6) {
        $timestamp = '09:00 PM - 09:30 PM';
    } elseif ($k == 7) {
        $timestamp = '09:30 PM - 10:00 PM';
    }
?>
    <div class="text-success font-weight-bold mt-5 ml-2">Time : <?php echo $timestamp ?> <br> <span class="text-dark font-weight-light">( Esewa/Khalti : 9827101710 )</span> </div>
    <table class="table">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Slot no.</th>
                <th>Player 1</th>
                <th>Player 2</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 1; $i <= 8; $i++) {
                if ($i == 1) {
                    $m = "1/2";
                } else if ($i == 2) {
                    $m = "3/4";
                } else if ($i == 3) {
                    $m = "5/6";
                } else if ($i == 4) {
                    $m = "7/8";
                } else if ($i == 5) {
                    $m = "9/10";
                } else if ($i == 6) {
                    $m = "11/12";
                } else if ($i == 7) {
                    $m = "13/14";
                } else if ($i == 8) {
                    $m = "15/16";
                }
            ?>
                <tr>
                    <td scope="row"><?php echo $i; ?></td>
                    <td><?php echo $m; ?></td>
                    <?php
                    for ($j = 1; $j <= 2; $j++) {
                        $player = "SELECT * FROM eveningPlayers WHERE sn = '$i' AND player = '$j' AND timeSelect = '$timestamp' AND status='1'";
                        $player_result = mysqli_query($conn, $player);
                        $row = $player_result->fetch_assoc();
                    ?>
                        <td><?php echo $row['name']; ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>

<?php include '../footer.php'; ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>