<!-- <body id="page-top" style='background-color:#f9f6f1;'>

  <form>
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
          <div class="row">
            <div class="col text-center pt-4">
              <h2 style="color:black; font-weight:700">Course Applicants Registration Form</h2>
            </div>
          </div> -->

          <!-- University Short Profile -->
          <!-- <div class="form-outline mt-4">
            <textarea class="form-control" rows="3" name="uni_shortprofile" placeholder="Applicant Address" required></textarea>
          </div> -->

          <!--Logo & University Name -->
          <!-- <div class="row align-items-center mt-3">
          <div class="col">
              <input type="text" class="form-control" name="uni_name" placeholder="Applicant Identification" required>
            </div>
            <div class="col">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="uni_logo" required>
                <label class="custom-file-label" for="customFile">Applicant Document</label>
              </div>
            </div>
          </div> -->

          <!-- Term and Conditions & Register Button -->
          <!-- <div class="row justify-content-start mt-4">
            <div class="col">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" required>
                  I Read and Accept <a href="https://newinti.edu.my/legal/privacy/">Terms and Conditions</a>
                </label>
              </div>
              <button type="submit" class="btn btn-success mt-4" style="float:right; width:23%;">Apply</i></button>
            </div>
          </div>
        </div>
      </div>
  </form> -->
  

  <!-- <script>
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
  </script> -->


  <!-- Jquery plugin -->
<script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>


<!-- Page level custom scripts -->

<!-- Set base url to javascript variable-->
<script type="text/javascript">
	var base_url = "<?php echo base_url(); ?>";
</script>

<style>
	.number {
		overflow: hidden;
		text-align: center;
	}

	.number:before,
	.number:after {
		background-color: #000;
		content: "";
		display: inline-block;
		height: 1px;
		position: relative;
		vertical-align: middle;
		width: 70%;
	}

	.number:before {
		right: 0.7em;
		margin-left: -90%;
	}

	.number:after {
		left: 0.7em;
		margin-right: -20%;
	}
</style>

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
										<div class="pl-4 pb-3" style="font-size:14px; color:black; ">Select your role before you fill in your detail in the registration form.</div>

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
									<div class="pt-5 px-5" style="font-size:23px; letter-spacing: 8px; color:#787878; font-weight:700;">ACADEMIC COUNSELOR REGISTRATION PAGE</div>
								</center>
								<!-- Input fields (Form) -->
								<form>
									<!-- Phone number and business email-->
									<div class="form-row pt-4 px-3">
										<div class="form-group col-md-6 px-2">
											<input type="number" name="ac_phonenumber" class="form-control border-bottom" id="ac_phonenumber" style="border: 0;" placeholder="Enter your phone number" required>
										</div>
										<div class="form-group col-md-6 px-2">
											<input type="type" name="ac_businessemail" class="form-control border-bottom" id="ac_businessemail" style="border: 0;" placeholder="Enter your business email" required>
										</div>
									</div>
									<!-- Nationality -->
									<div class="form-row pt-3 px-3">
										<div class="form-group col-md-12 px-2">
											<input type="email" name="ac_nationality" class="form-control border-bottom" id="ac_nationality" style="border: 0;" placeholder="Enter your nationality" required>
										</div>
									</div>
									<!-- Date and gender -->
									<div class="form-row pt-3 pb-3 px-3">
										<div class="form-group col-md-6 px-2">
											<input type="date" name="ac_dob" class="form-control border-bottom" id="ac_dob" style="border: 0;" required>
										</div>
										<div class="form-holder mb-3 ml-3" style="align-self: flex-end; transform: translateY(4px);">
											<div class="checkbox-tick">
												<label class="male ml-3">
													<input type="radio" name="ac_gender" value="male" required> Male<br>
													<span class="checkmark"></span>
												</label>
												<label class="female ml-5">
													<input type="radio" name="ac_gender" value="female" required> Female<br>
													<span class="checkmark"></span>
												</label>
											</div>
										</div>
									</div>
									<!-- University  -->
									<div class="form-row px-3">
										<div class="form-group col-md-12 px-2">
											<input type="type" name="ac_university" class="form-control border-bottom" id="ac_university" style="border: 0;" placeholder="Enter your university" required>
										</div>
									</div>
									<!-- Upload Document -->
									<div class="form-row pt-2 px-4">
										<div class="form-group col-md-12 px-2">
											<input type="file" class="custom-file-input" id="form-group" name="ac_document">
											<label class="custom-file-label" for="customFile">Upload Document</label>
										</div>
									</div>
									<!-- Terms & Condition -->
									<div class="T&C ml-4">
										<label> Please accept our <a href="https://newinti.edu.my/legal/privacy/">terms and conditions</a>
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