<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('includes/config.php');

if(isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $mobile = $_POST['mobileno'];
    $email = $_POST['emailid'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $donationItems = $_POST['bloodgroup'];
    $address = $_POST['address'];
    $message = $_POST['message'];
    $status = 1;
    $password = md5($_POST['password']);

    $ret = "SELECT EmailId FROM tblblooddonars WHERE EmailId = :email";
    $query = $dbh->prepare($ret);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();

    if($query->rowCount() == 0) {
        $sql = "INSERT INTO tblblooddonars (FullName, MobileNumber, EmailId, Age, Gender, DonationItems, Address, Message, status, Password) 
                VALUES (:fullname, :mobile, :email, :age, :gender, :donationItems, :address, :message, :status, :password)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':age', $age, PDO::PARAM_STR);
        $query->bindParam(':gender', $gender, PDO::PARAM_STR);
        $query->bindParam(':donationItems', $donationItems, PDO::PARAM_STR);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->bindParam(':message', $message, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();

        if($lastInsertId) {
            echo "<script>alert('You have signed up successfully');</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    } else {
        echo "<script>alert('Email-id already exists. Please try again');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>CareCycle | Sign Up</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
</head>
<body>
<?php include('includes/header.php'); ?>

<div class="inner-banner-w3ls"><div class="container"></div></div>

<section class="about py-5">
    <div class="container py-xl-5 py-lg-3">
        <div class="login px-4 mx-auto mw-100">
            <h5 class="text-center mb-4">Register Now</h5>
            <form action="#" method="post" name="signup">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="fullname" required>
                </div>
                <div class="form-group">
                    <label>Mobile Number</label>
                    <input type="text" class="form-control" name="mobileno" required maxlength="10" pattern="[0-9]+">
                </div>
                <div class="form-group">
                    <label>Email Id</label>
                    <input type="email" class="form-control" name="emailid" required>
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" class="form-control" name="age" required>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Donation Items</label>
                    <select name="bloodgroup" class="form-control" required>
                        <?php 
                        $sql = "SELECT * FROM tblbloodgroup";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        if($query->rowCount() > 0) {
                            foreach($results as $result) {
                                echo '<option value="'.htmlentities($result->BloodGroup).'">'.htmlentities($result->BloodGroup).'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" required>
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control" name="message" required></textarea>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary submit mb-4" name="submit">Register</button>
                <p class="account-w3ls text-center pb-4">Already Registered? <a href="login.php">Signin now</a></p>
            </form>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/responsiveslides.min.js"></script>
<script src="js/fixed-nav.js"></script>
<script src="js/SmoothScroll.min.js"></script>
<script src="js/move-top.js"></script>
<script src="js/easing.js"></script>
<script src="js/medic.js"></script>
</body>
</html>