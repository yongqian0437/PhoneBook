<body id="page-top" style='background-color:#f9f6f1;'>

  <form>
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
          <div class="row">
            <div class="col text-center pt-4">
              <h2 style="color:black; font-weight:700">University Registration Form</h2>
            </div>
          </div>

          <!--Logo & University Name -->
          <div class="row align-items-center mt-3">
            <div class="col">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="uni_logo" required>
                <label class="custom-file-label" for="customFile">Upload Logo</label>
              </div>
            </div>
            <div class="col">
              <input type="text" class="form-control" name="uni_name" placeholder="University Name" required>
            </div>
          </div>

          <!-- University Short Profile -->
          <div class="form-outline mt-4">
            <textarea class="form-control" rows="2" name="uni_shortprofile" placeholder="Short Profile" required></textarea>
          </div>

          <!-- Country and Total Courses -->
          <div class="row align-items-center mt-4">
            <div class="col">
              <input type="text" class="form-control" name="uni_country" placeholder="Country of University" required>
            </div>
            <div class="col">
              <input type="number" class="form-control" name="uni_totalcourses" placeholder="Total Courses of University" required>
            </div>
          </div>

          <!-- Hotline and Email -->
          <div class="row align-items-center mt-4">
            <div class="col">
              <input type="number" class="form-control" name="uni_hotline" placeholder="University Hotline" required>
            </div>
            <div class="col">
              <input type="email" class="form-control" name="uni_email" placeholder="University Email" required>
            </div>
          </div>

          <!-- Address -->
          <div class="form-outline mt-4">
            <textarea class="form-control" rows="2" name="uni_address" placeholder="University Address" required></textarea>
          </div>

          <!-- QS Ranking, Employability Rank & Total Students -->
          <div class="row align-items-center mt-4">
            <div class="col">
              <input type="number" class="form-control" name="uni_qsrank" placeholder="QS Ranking" required>
            </div>
            <div class="col">
              <input type="number" class="form-control" name="uni_employabilityrank" placeholder="Employability Rank" required>
            </div>
            <div class="col">
              <input type="number" class="form-control" name="uni_totalstudents" placeholder="Total Students" required>
            </div>
          </div>

          <!-- Term and Conditions & Register Button -->
          <div class="row justify-content-start mt-4">
            <div class="col">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" required>
                  I Read and Accept <a href="https://newinti.edu.my/legal/privacy/">Terms and Conditions</a>
                </label>
              </div>
              <button type="submit" class="btn btn-success mt-4" style="float:right; width:23%;">Register</i></button>
            </div>
          </div>
        </div>
      </div>
  </form>
  

  <script>

    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
  </script>