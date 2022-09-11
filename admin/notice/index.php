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
    <a class="navbar-brand" href="../manage/index.php">Manage Players</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="../room/index.php">Manage room <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../notice/index.php">Manage notice <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <a name="" id="" class="btn btn-primary mr-2" href="../../process/logout.php" role="button">Logout</a>
        <a name="" id="" class="btn btn-danger mr-2" href="../deleteMorning/index.php" role="button">Delete Day Players</a>
        <a name="" id="" class="btn btn-danger mr-2" href="../deleteEvening/index.php" role="button">Delete Night Players</a>
        <a name="" id="" class="btn btn-success mr-2" href="changeloop.php" role="button">Change time</a>
        <button type="button" class="btn btn-secondary mr-2" data-toggle="modal" data-target="#modelId">Add Notice</button>
        <a name="" id="" class="btn btn-light mr-2" href="../addentry/index.php" role="button">View/Hide Add Entry</a>
        <a name="" id="" class="btn btn-primary mr-2" href="../activetournament/index.php" role="button">View/Hide Active Tournament</a>
        <a name="" id="" class="btn btn-primary mr-2" href="../activetournament/edit.php" role="button">Add link</a>

    </div>
</nav>

<?php
if(isset($_POST['submit']))
{
    $description = $_POST['description'];
    $insert = "INSERT into notice(description) VALUES('$description')";
    $insertres = mysqli_query($conn,$insert);
}
?>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add notice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                  <div class="form-group">
                    <form action="#" method="post">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="" rows="3"></textarea>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<body>
    <table class="table">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $noticequery = "SELECT * FROM notice";
        $noticeres = mysqli_query($conn,$noticequery);
        $i=0;
        while($notice = $noticeres->fetch_assoc())
        {
            $i++;
        ?>
            <tr>
                <td scope="row"><?php echo $i; ?></td>
                <td><?php echo $notice['description']; ?></td>
                <td>
                    <a name="" id="" class="btn btn-primary" href="edit.php?id=<?php echo $notice['id']; ?>" role="button">Edit</a>
                    <a name="" id="" class="btn btn-danger" href="delete.php?id=<?php echo $notice['id']; ?>" role="button">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>