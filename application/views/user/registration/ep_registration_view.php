<!-- Jquery plugin -->
<script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>


<!-- Page level custom scripts -->

<!-- Set base url to javascript variable-->
<script type="text/javascript">
	var base_url = "<?php echo base_url(); ?>";
</script>

<link href="<?php echo base_url() ?>assets/css/forms.css" rel="stylesheet">

<body id="page-top" style='background-color:#f9f6f1;'>

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Begin Page Content -->
				<div class="container-fluid ">

					<!-- Cards for registration -->
					<div class="row justify-content-md-center pt-5" style='background-color:#f9f6f1;'>

						<!-- Steps -->
						<div class="col-xl-3">
							<div class="card h-100 " id='card1'>
								<div class="card-body" style="background-color:#DAE7E0">

									<div class="pl-3 pr-3 pt-4">
										<div class="pl-4" style="font-size:16px; font-weight:700; color:black;">Join Interactive Joint Education Employability System (iJEES) in</div>
										<div class="pt-2 pl-4 pb-3" style="font-size:38px; color:green; font-weight:900;">3 STEPS</div>

										<div class="pl-4">
											<div class="number pt-4 pl-4 pb-1" style="font-size:18px; color:green; font-weight:900;">01</div>
										</div>
										<div class="pl-4 pb-3" style="font-size:14px; color:black;">Select your role before you fill in your detail in the registration form.</div>

										<div class="pl-4">
											<div class="number pt-4 pl-4 pb-1" style="font-size:18px; color:green; font-weight:900;">02</div>
										</div>
										<div class="pl-4 pb-3" style="font-size:14px; color:black;">If you already have an existing account, login now with your credentials. </div>

										<div class="pl-4">
											<div class="number pt-4 pl-4 pb-1" style="font-size:18px; color:green; font-weight:900;">03</div>
										</div>
										<div class="pl-4 pb-5" style="font-size:14px; color:black;">After login, you are on the main page based on your role. </div>

									</div>

								</div>
							</div>
						</div>

						<!-- Form -->
						<div class="col-xl-5 ">
							<div class="card h-100" id='card2' ">
                                <div class=" card-body">
								<center>
									<div class="pt-5 px-5" style="font-size:23px; letter-spacing: 8px; color:#787878; font-weight:700;">EDUCATION PARTNER REGISTRATION PAGE</div>
								</center>
								<!-- Input fields (Form) -->
                                <form method="post" action="<?= base_url('user/login/Auth/ep_reg');?>">
									<!-- Phone number and business email-->
									<div class="form-row pt-4 px-3">
										<div class="form-group col-md-6 px-2">
											<input type="number" name="ep_phonenumber" class="form-control border-bottom" id="ep_phonenumber" style="border: 0;" placeholder="Enter your phone number" value="<?=set_value('ep_phonenumber') ?>">
                                            <?= form_error('ep_phonenumber','<small class="text-danger pl-3">','</small>');?>
                                        </div>
										<div class="form-group col-md-6 px-2">
											<input type="email" name="ep_businessemail" class="form-control border-bottom" id="ep_businessemail" style="border: 0;" placeholder="Enter your business email" value="<?=set_value('ep_businessemail') ?>">
                                            <?= form_error('ep_businessemail','<small class="text-danger pl-3">','</small>');?>
										</div>
									</div>
									<!-- Nationality -->
									<div class="form-row pt-3 px-3">
										<div class="form-group col-md-12 px-2">
											<input type="text" name="ep_nationality" class="form-control border-bottom" id="ep_nationality" style="border: 0;" placeholder="Enter your nationality" required>
										</div>
									</div>
									<!-- Date and gender -->
									<div class="form-row pt-3 pb-3 px-3">
										<div class="form-group col-md-6 px-2">
											<input type="date" name="ep_dob" class="form-control border-bottom" id="ep_dob" style="border: 0;" required>
										</div>
										<div class="form-holder mb-3 ml-3" style="align-self: flex-end; transform: translateY(4px);">
											<div class="checkbox-tick">
												<label class="male ml-3">
													<input type="radio" name="ep_gender" value="male" required> Male<br>
													<span class="checkmark"></span>
												</label>
												<label class="female ml-5">
													<input type="radio" name="ep_gender" value="female" required> Female<br>
													<span class="checkmark"></span>
												</label>
											</div>
										</div>
									</div>
									<!-- Job Title  -->
									<div class="form-row px-3">
										<div class="form-group col-md-12 px-2">
											<input type="type" name="ep_jobtitle" class="form-control border-bottom" id="ep_jobtitle" style="border: 0;" placeholder="Enter your job title" required>
										</div>
									</div>
									<!-- Upload Document -->
									<div class="form-row pt-2 px-4">
										<div class="form-group col-md-12 px-2">
											<input type="file" class="custom-file-input" id="form-group" name="ep_document">
											<label class="custom-file-label" for="customFile">Upload a file</label>
										</div>
									</div>
									<!-- Terms & Condition -->
									<div class="T&C ml-4">
										<label><input type="checkbox"> Please accept our <a href="https://newinti.edu.my/legal/privacy/">terms and conditions</a>
										</label>
									</div>
									<!-- Submit button -->
									<div class="pt-2 pr-3">
										<button type="submit" class="btn btn-success" style="float:right; width:23%;">Register <i class="fas fa-check"></i></button>
									</div>

								</form>
								<!-- End of Input fields (Form) -->
							</div>
						</div>
					</div>

				</div>
				<!-- END OF ROW -->
				<!-- END OF FORM -->
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- End of Main Content -->

		<script>
			// File appear on select
			$(".custom-file-input").on("change", function() {
				var fileName = $(this).val().split("\\").pop();
				$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
			});
		</script>