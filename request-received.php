<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['bbdmsdid']) == 0) {
    header('location:logout.php');
} else {
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>CareCycle | Request Received</title>

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <!-- Popper JS library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <script src="Scripts/umd/popper.min.js"></script>

    <!-- Custom-Files -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/fontawesome-all.css">

    <!-- Web-Fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700&amp;subset=latin-ext" rel="stylesheet">

</head>

<body>
<?php include('includes/header.php'); ?>

<!-- banner -->
<div class="inner-banner-w3ls">
    <div class="container"></div>
</div>
<!-- //banner -->

<!-- Request Received Content -->
<div class="appointment py-5">
    <div class="py-xl-5 py-lg-3">
        <div class="w3ls-titles text-center mb-5">
            <h3 class="title">Request Received</h3>
            <span><i class="fas fa-user-md"></i></span>
        </div>
        <div class="d-flex">
            <div class="contact-right-w3l appoint-form" style="width:100% !important;">
                <h5 class="title-w3 text-center mb-5">Below is the detail of Requirer Items.</h5>
                <table border="1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Mobile Number</th>
                            <th>Email</th>
                            <th>Item Require For</th>
                            <th>Message</th>
                            <th>Apply Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $uid = $_SESSION['bbdmsdid'];
                        $sql = "SELECT tblbloodrequirer.BloodDonarID, tblbloodrequirer.name, tblbloodrequirer.EmailId, tblbloodrequirer.ContactNumber, tblbloodrequirer.DonationsRequirer, tblbloodrequirer.Message, tblbloodrequirer.ApplyDate, tblblooddonars.id as donid 
                                FROM tblbloodrequirer 
                                JOIN tblblooddonars ON tblblooddonars.id = tblbloodrequirer.BloodDonarID 
                                WHERE tblbloodrequirer.BloodDonarID = :uid";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':uid', $uid, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                            foreach ($results as $row) {
                        ?>
                        <tr>
                            <td><?php echo htmlentities($cnt); ?></td>
                            <td><?php echo htmlentities($row->name); ?></td>
                            <td><?php echo htmlentities($row->ContactNumber); ?></td>
                            <td><?php echo htmlentities($row->EmailId); ?></td>
                            <td><?php echo htmlentities($row->DonationsRequirer); ?></td>
                            <td><?php echo htmlentities($row->Message); ?></td>
                            <td><?php echo htmlentities($row->ApplyDate); ?></td>
                        </tr>
                        <?php $cnt++; } } else { ?>
                        <tr>
                            <th colspan="7" style="color:red;">No Record Found</th>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- //Request Received Content -->

<?php include('includes/footer.php'); ?>

<!-- Js files -->
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/responsiveslides.min.js"></script>
<script>
    $(function () {
        $("#slider4").responsiveSlides({
            auto: true,
            pager: true,
            nav: true,
            speed: 1000,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });
    });
</script>

<script src="js/fixed-nav.js"></script>
<script src="js/SmoothScroll.min.js"></script>
<script src="js/move-top.js"></script>
<script src="js/easing.js"></script>
<script src="js/medic.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>
<?php } ?>
