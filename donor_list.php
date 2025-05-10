<?php
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>CareCycle | Blood Donor List </title>
	
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
     
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">

	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">

</head>

<body>
	<?php include('includes/header.php');?>


	<div class="inner-banner-w3ls">
		<div class="container">

		</div>
	
	</div>
	<!-- <div class="breadcrumb-agile">
		<div aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Blood Donar List</li>
			</ol>
		</div>
	</div> -->

	<div class="agileits-contact py-5">
		<div class="py-xl-5 py-lg-3">
			
			<div class="w3ls-titles text-center mb-5">
				<h3 class="title">Blood Donor List</h3>
				<span>
					<i class="fas fa-user-md"></i>
				</span>
			</div>
			<div class="d-flex">
				
				<div class="row package-grids mt-5" style="padding-left: 50px;">
				<?php
				
$status=1;
 

$sql = "SELECT * from tblblooddonars where status=:status";
$query = $dbh -> prepare($sql);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
				<div class="col-md-4 pricing">
					
					<div class="price-top">
					
							<img src="images/blood-donor.jpg" alt="Blood Donot" style="border:1px #000 solid" class="img-fluid" />
				
						<h3><?php echo htmlentities($result->FullName);?>
						</h3>
					</div>
					<div class="price-bottom p-4">


<table class="table table-bordered">

    <tbody>
      <tr>
        <th>Gender</th>
        <td><?php echo htmlentities($result->Gender);?></td>
      </tr>
      <tr>
        <td>Blood Group</td>
        <td><?php echo htmlentities($result->BloodGroup);?></td>
      </tr>
      <tr>
        <td>Mobile Number</td>
        <td><?php echo htmlentities($result->MobileNumber);?></td>
      </tr>

         <tr>
        <td>Email</td>
        <td><?php echo htmlentities($result->EmailId);?></td>
      </tr>

               <tr>
        <td>Age</td>
        <td><?php echo htmlentities($result->Age);?></td>
      </tr>

        <tr>
        <td>Address</td>
        <td><?php echo htmlentities($result->Address);?></td>
      </tr>

<tr>
        <td>Message</td>
        <td><?php echo htmlentities($result->Message);?></td>
      </tr>

    </tbody>
</table>
<a class="btn btn-primary" style="color:#fff"  href="contact-blood.php?cid=<?php echo $result->id;?>">Request</a>
					</div>
				</div><br>
			<?php }} ?>
			
			
			</div>
			</div>
		</div>
	</div>

	<?php include('includes/footer.php');?>

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