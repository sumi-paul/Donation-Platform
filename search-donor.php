<?php
//error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>CareCycle | Search Donor</title>

	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);
		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

	<!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/fontawesome-all.css">

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">

</head>

<body>

<?php include('includes/header.php'); ?>

<!-- banner 2 -->
<div class="inner-banner-w3ls">
	<div class="container"></div>
</div>
<!-- //banner 2 -->

<!-- search donor form -->
<div class="agileits-contact py-5">
	<div class="py-xl-5 py-lg-3">
		<form name="donar" method="post" style="padding-left: 30px;">
			<div class="row">
				<div class="col-lg-4 mb-4">
					<div class="font-italic">Items<span style="color:red">*</span></div>
					<div>
						<select name="bloodgroup" class="form-control" required>
							<?php 
							$sql = "SELECT * FROM tblbloodgroup";
							$query = $dbh->prepare($sql);
							$query->execute();
							$results = $query->fetchAll(PDO::FETCH_OBJ);
							if($query->rowCount() > 0) {
								foreach($results as $result) { ?>  
									<option value="<?php echo htmlentities($result->BloodGroup);?>">
										<?php echo htmlentities($result->BloodGroup);?>
									</option>
							<?php } } ?>
						</select>
					</div>
				</div>

				<div class="col-lg-4 mb-4">
					<div class="font-italic">Location</div>
					<div><textarea class="form-control" name="location"></textarea></div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 mb-4">
					<div><input type="submit" name="sub" class="btn btn-primary" value="submit" style="cursor:pointer"></div>
				</div>
			</div>
		</form>

		<div class="agileits-contact py-5">
			<div class="py-xl-5 py-lg-3">
				<?php
				if(isset($_POST['sub'])) {
					$status = 1;
					$bloodgroup = $_POST['bloodgroup'];
					$location = $_POST['location'];

					// FIX: change BloodGroup to DonationItems
					$sql = "SELECT * FROM tblblooddonars WHERE (status=:status AND DonationItems=:bloodgroup) OR (Address=:location)";
					$query = $dbh->prepare($sql);
					$query->bindParam(':status', $status, PDO::PARAM_STR);
					$query->bindParam(':bloodgroup', $bloodgroup, PDO::PARAM_STR);
					$query->bindParam(':location', $location, PDO::PARAM_STR);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);

					if($query->rowCount() > 0) { ?>

					<div class="w3ls-titles text-center mb-5">
						<h3 class="title">Search Donor</h3>
						<span><i class="fas fa-user-md"></i></span>
					</div>

					<div class="d-flex">
						<div class="row package-grids mt-5" style="padding-left: 50px;">
							<?php foreach($results as $result) { ?>
							<div class="col-md-6 pricing">
								<div class="price-top">
									<a href="single.html">
										<img src="images/blood-donor.jpg" alt="Blood Donor" style="border:1px solid #000" class="img-fluid" />
									</a>
									<h3><?php echo htmlentities($result->FullName); ?></h3>
								</div>

								<div class="price-bottom p-4">
									<table class="table table-bordered">
										<tbody>
											<tr>
												<th>Gender</th>
												<td><?php echo htmlentities($result->Gender); ?></td>
											</tr>
											<tr>
												<td>Items</td>
												<td><?php echo htmlentities($result->DonationItems); ?></td>
											</tr>
											<tr>
												<td>Mobile No.</td>
												<td><?php echo htmlentities($result->MobileNumber); ?></td>
											</tr>
											<tr>
												<td>Email ID</td>
												<td><?php echo htmlentities($result->EmailId); ?></td>
											</tr>
											<tr>
												<td>Age</td>
												<td><?php echo htmlentities($result->Age); ?></td>
											</tr>
											<tr>
												<td>Address</td>
												<td><?php echo htmlentities($result->Address); ?></td>
											</tr>
											<tr>
												<td>Message</td>
												<td><?php echo htmlentities($result->Message); ?></td>
											</tr>
										</tbody>
									</table>
									<a class="btn btn-primary" style="color:#fff" href="contact-blood.php?cid=<?php echo $result->id;?>">Request</a>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>

				<?php } else {
					echo htmlentities("No Record Found");
				}
			}
				?>
			</div>
		</div>
	</div>
</div>

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
