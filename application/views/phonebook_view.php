
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

        html {
            scroll-behavior: smooth;
        }

        .box2 {
            padding: 20px;
        }

    </style>
    <title>Phonebook</title>
</head>
<body id="page-top">

    <!-- Top Navigation -->
    <?php $this->load->view('templates/topnav'); ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid" style="background:#FFFF">

                    <div class="row">
                        <div class="col-12 md-8">
                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-2 px-4">
                                <h3 class="h3 mb-0 text-gray-800 pt-4 font-weight-bold">PhoneBook</h3>
                            </div>
                        </div>
                    </div>

                    <div class="px-4 pb-4">
                        <hr style="width: 100%; height: 2px; background-color: #EAF4F4">
                    </div>

                    <div class="box2">
                        <!-- Form for Adding -->
                        <div class="row">
                            <div class="col-md-4">
                                <h4><?= isset($entry) ? 'Edit Entry' : 'Add Entry'; ?></h4>
                                <?= form_open_multipart($form_action, ['method' => 'POST']); ?>
                                <div class="form-group">
                                    <label for="phonebook_name">Name</label>
                                    <input type="text" class="form-control" id="phonebook_name" name="phonebook_name" value="<?= isset($entry) ? set_value('phonebook_name', $entry->phonebook_name) : set_value('phonebook_name'); ?>" required>
                                    <?= form_error('phonebook_name'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">Phone</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= isset($entry) ? set_value('phone_number', $entry->phone_number) : set_value('phone_number'); ?>" required>
                                    <?= form_error('phone_number'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= isset($entry) ? set_value('email', $entry->email) : set_value('email'); ?>" required>
                                    <?= form_error('email'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control-file" id="image" name="image">
                                    <?php if (isset($entry) && $entry->image) : ?>
                                        <img src="<?= base_url($entry->image); ?>" alt="<?= $entry->phonebook_name; ?>" width="50">
                                    <?php endif; ?>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary"><?= isset($entry) ? 'Update Record' : 'Add Record'; ?></button>
                                <?= form_close(); ?>
                            </div>
                        </div>
                        <!-- Flash Message -->
                        <?php if ($this->session->flashdata('message')) : ?>
                            <div id="flash_message" class="alert alert-success mt-4" role="alert">
                                <?= $this->session->flashdata('message'); ?>
                            </div>
                        <?php elseif ($this->session->flashdata('error')) : ?>
                            <div id="flash_message" class="alert alert-danger mt-4" role="alert">
                                <?= $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Footer -->

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to fade out the flash message
        function fadeOutFlashMessage() {
            var flashMessage = document.getElementById('flash_message');
            if (flashMessage) {
                // Apply CSS transition for fading out
                flashMessage.style.transition = "opacity 4s";
                flashMessage.style.opacity = 0;

                // After 2 seconds, remove the flash message from the DOM
                setTimeout(function() {
                    flashMessage.style.display = 'none';
                }, 2000);
            }
        }

        // Call the function to fade out the flash message
        fadeOutFlashMessage();
    });
    </script>
</body>
