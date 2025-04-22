<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0) {
    header('location:index.php');
} else {

// Make Hidden
if(isset($_REQUEST['hidden'])) {
    $eid=intval($_GET['hidden']);
    $status="0";
    $sql = "UPDATE donors SET Status=:status WHERE id=:eid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->bindParam(':eid',$eid,PDO::PARAM_STR);
    $query->execute();
    $msg="Donor details hidden successfully";
}

// Make Public
if(isset($_REQUEST['public'])) {
    $aeid=intval($_GET['public']);
    $status=1;
    $sql = "UPDATE donors SET Status=:status WHERE id=:aeid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->bindParam(':aeid',$aeid,PDO::PARAM_STR);
    $query->execute();
    $msg="Donor details made public";
}

// Delete
if(isset($_REQUEST['del'])) {
    $did=intval($_GET['del']);
    $sql = "DELETE FROM donors WHERE id=:did";
    $query = $dbh->prepare($sql);
    $query->bindParam(':did',$did,PDO::PARAM_STR);
    $query->execute();
    $msg="Record deleted successfully";
}
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <title>Donor List</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .errorWrap { padding:10px; margin: 0 0 20px 0; background: #fff; border-left: 4px solid #dd3d36; box-shadow: 0 1px 1px 0 rgba(0,0,0,.1); }
        .succWrap { padding:10px; margin: 0 0 20px 0; background: #fff; border-left: 4px solid #5cb85c; box-shadow: 0 1px 1px 0 rgba(0,0,0,.1); }
    </style>
</head>

<body>
<?php include('includes/header.php'); ?>

<div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <h2 class="page-title">Donors List</h2>

            <div class="panel panel-default">
                <div class="panel-heading">Donors Info</div>
                <a href="download-records.php" class="btn btn-info" style="font-size:16px;">Download Donor List</a>
                <div class="panel-body">
                    <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($error); ?> </div><?php } 
                    else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?> </div><?php }?>

                    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Mobile No</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Donation Items</th>
                                <th>Address</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Mobile No</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Donation Items</th>
                                <th>Address</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
<?php
$sql = "SELECT * FROM donors";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if($query->rowCount() > 0) {
    foreach($results as $result) {
?>
<tr>
    <td><?php echo htmlentities($cnt); ?></td>
    <td><?php echo htmlentities($result->FullName); ?></td>
    <td><?php echo htmlentities($result->MobileNumber); ?></td>
    <td><?php echo htmlentities($result->EmailId); ?></td>
    <td><?php echo htmlentities($result->Age); ?></td>
    <td><?php echo htmlentities($result->Gender); ?></td>
    <td><?php echo htmlentities($result->DonationItems); ?></td>
    <td><?php echo htmlentities($result->Address); ?></td>
    <td><?php echo htmlentities($result->Message); ?></td>
    <td>
        <?php if($result->Status == 1) { ?>
            <a href="donor-list.php?hidden=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Make this record hidden?')" class="btn btn-warning btn-sm">Hide</a>
        <?php } else { ?>
            <a href="donor-list.php?public=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Make this record public?')" class="btn btn-success btn-sm">Unhide</a>
        <?php } ?>
        <a href="donor-list.php?del=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Are you sure to delete this record?')" class="btn btn-danger btn-sm mt-2">Delete</a>
    </td>
</tr>
<?php $cnt++; } } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- JS Scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/fileinput.js"></script>
<script src="js/chartData.js"></script>
<script src="js/main.js"></script>

</body>
</html>
<?php } ?>
