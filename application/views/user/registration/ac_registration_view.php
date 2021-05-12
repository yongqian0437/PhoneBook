<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Academic Counselor Registration Form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="colorlib.com">

	<!-- MATERIAL DESIGN ICONIC FONT -->
	<link href="<?php echo base_url() ?>assets/fonts/material-design-iconic-font/css/material-design-iconic-font.css" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="<?php echo base_url() ?>assets/css/registration.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/scss/registration.scss" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<form action="" id="wizard">
			<!-- SECTION 1 -->
			<h2></h2>
			<section>
				<div class="inner">
					<div class="image-holder">
						<img src="assets/img/forms/Registration_steps.jpg" alt="">
					</div>
					<div class="form-content">
						<div class="form-header">
							<h3>Academic Counselor Registration</h3>
						</div>
						<p>Please fill your business contact details</p>
						<div class="form-row">
							<div class="form-holder">
								<input type="text" name="ac_phonenumber" placeholder="Phone Number" class="form-control" required>
							</div>
							<div class="form-holder">
								<input type="text" name="ac_businessemail" placeholder="Business Email" class="form-control" required>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- SECTION 2 -->
			<h2></h2>
			<section>
				<div class="inner">
					<div class="image-holder">
						<img src="assets/img/forms/Registration_steps.jpg" alt="">
					</div>
					<div class="form-content">
						<div class="form-header">
							<h3>Academic Counselor Registration</h3>
						</div>
						<p>Please fill your personal details</p>
						<div class="form-row">
							<div class="form-holder">
								<input type="text" name="ac_nationality" placeholder="Nationality" class="form-control">
							</div>
							<div class="form-holder">
								<input type="date" name="ac_dob" placeholder="Date of Birth" class="form-control">
							</div>
						</div>
						<div class="form-holder" style="align-self: flex-end; transform: translateY(4px);">
							<div class="checkbox-tick">
								<label class="male">
									<input type="radio" name="ac_gender" value="male" checked> Male<br>
									<span class="checkmark"></span>
								</label>
								<label class="female">
									<input type="radio" name="ac_gender" value="female"> Female<br>
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- SECTION 3 -->
			<h2></h2>
			<section>
				<div class="inner">
					<div class="image-holder">
						<img src="assets/img/forms/Registration_steps.jpg" alt="">
					</div>
					<div class="form-content">
						<div class="form-header">
							<h3>Academic Counselor Registration</h3>
						</div>
						<p>Please fill in your academic counselor details</p>
						<div class="form-row">
							<div class="form-holder">
								<input type="text" name="ac_jobtitle" placeholder="University" class="form-control">
							</div>
							<div class="form-holder">
								<input type="file" name="ac_document" class="form-control">
							</div>
						</div>
						<div class="checkbox-circle mt-24">
							<label>
								<input type="checkbox" checked required> I do accept the <a href="#">terms and conditions</a> of your site.
								<span class="checkmark"></span>
							</label>
						</div>
					</div>
				</div>
			</section>
		</form>
	</div>

	<!-- JQUERY -->
	<script src="<?php echo base_url() ?>assets/js/additional/jquery-3.3.1.min.js"></script>

	<!-- JQUERY STEP -->
	<script src="<?php echo base_url() ?>assets/js/additional/jquery.steps.js"></script>
	<script src="<?php echo base_url() ?>assets/js/additional/main.js"></script>
	<!-- Template created and distributed by Colorlib -->

</body>

</html>