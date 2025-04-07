
<?php
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>CareCycle</title>
	
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->


<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<!-- Popper JS library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>



	<script type="text/javascript" src='js/bootstrap.js'></script>

	<script src="Scripts/umd/popper.min.js"></script>

	<!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="css/fontawesome-all.css">

	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //Web-Fonts -->

</head>

<body>
	<?php include('includes/header.php');?>

	<!-- banner -->
	<div class="slider">
		<div class="callbacks_container">
			<ul class="rslides callbacks callbacks1" id="slider4">
				<li>
					<div class="banner-top1">
						<div class="banner-info_agile_w3ls">
							<div class="container">
								<h3>
									<span>Your support makes a difference!</span> 
								</h3>
								
							</div>
						</div>
					</div>
				</li>
				<li>
					<!-- <div class="banner-top2">
						<div class="banner-info_agile_w3ls">
							<div class="container">
								<h3>Your donation may be a<span>drop in the bucket</span> , but to someone in need, it could mean the world
									
								</h3>
						
							</div>
						</div>
					</div> -->
				</li>
				<li>
					<!-- <div class="banner-top3">
						<div class="banner-info_agile_w3ls">
							<div class="container">
						
							</div>
						</div>
					</div> -->
				</li>
			</ul>
		</div>
	</div>
	<!-- //banner -->
	<div class="clearfix"></div>
	<div class="fix about">
				<h1>Who Can Give Blood</h1>
				
				<table class="listTable" border="2px" cellpadding="0px" cellspacing="0px">
					<tr>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
					<tr>
						<td bgcolor="#B2F4FA">
							<h3>When can I give Blood?</h3>
						</td>
						<td colspan="2" class="list1" bgcolor="#E5BEEB">
							<ul>
								<li>
									<p>Am I fit and healthy.</p>
								</li>
								<li>
									<p>Weigh between 7 stone 12 lbs and 25 stone, or 50kg and 160kg.</p>
								</li>
								<li>
									<p>Are aged between 17 and 66 (or 70 if you have given blood before).</p>
								</li>
								<li>
									<p>Are over 70 and have given blood in the last two years.</p>
								</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td bgcolor="#B2F4FA">
							<h3>How often can I give blood?</h3>
						</td>
						<td colspan="2" bgcolor="#E5BEEB">
							<p>Men can give blood every 12 weeks and women can give blood every 16 weeks. Find out more about what happens on the day of your donation.</p>
						</td>
					</tr>
					<tr>
						<td bgcolor="#B2F4FA">
							<h3>Male and Female Donors</h3>
						</td>
						<td colspan="2" bgcolor="#E5BEEB">
							<p>Men’s additional body weight means they have suitable iron levels. They are less likely than women to carry certain immune cells meaning their plasma is more widely usable for transfusions their platelet count is typically higher meaning they are more likely to be accepted as platelet donors.</p>
						</td>
					</tr>
					<tr>
						<td bgcolor="#B2F4FA">
							<h3>Women under 20-check if you can give blood</h3>
						</td>
						<td colspan="2" bgcolor="#E5BEEB">
							<p>If you are a woman under 20 and you weigh under 10st 3lb or 65kg or are under 5' 6" or 168cm tall you will need to estimate your blood volume to see if you can give blood. If your weight lies between two of the values shown, please use the nearest lower weight.</p>
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</div>
	<!-- footer -->
	<?php include('includes/footer.php');?>


	<!-- Js files -->
	<!-- JavaScript -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- Default-JavaScript-File -->

	<!-- banner slider -->
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
	<!-- //banner slider -->

	<!-- fixed navigation -->
	<script src="js/fixed-nav.js"></script>
	<!-- //fixed navigation -->

	<!-- smooth scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- move-top -->
	<script src="js/move-top.js"></script>
	<!-- easing -->
	<script src="js/easing.js"></script>
	<!--  necessary snippets for few javascript files -->
	<script src="js/medic.js"></script>

	<script src="js/bootstrap.js"></script>
	<!-- Necessary-JavaScript-File-For-Bootstrap -->

	<!-- //Js files -->

</body>

</html>