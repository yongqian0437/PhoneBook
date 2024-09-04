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
                                <h3 class="h3 mb-0 text-gray-800 pt-4 font-weight-bold">Records</h3>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 pb-4">
                        <hr style="width: 100%; height: 2px; background-color: #EAF4F4">
                    </div>
                    <div class="box2">

                        <!-- Table for Records -->
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Phone Book Records</h4>
                                <table class="table table-striped" id="record_table">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($entries as $entry) : ?>
                                            <tr>
                                                <td>
                                                    <?php if ($entry->image) : ?>
                                                        <img src="<?= base_url($entry->image); ?>" alt="<?= $entry->phonebook_name; ?>" width="110">
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $entry->phonebook_name; ?></td>
                                                <td><?= $entry->phone_number; ?></td>
                                                <td><?= $entry->email; ?></td>                                         
                                                <td>
                                                    <button class="btn btn-primary btn-sm edit-btn" data-id="<?= $entry->book_id; ?>" data-name="<?= $entry->phonebook_name; ?>" data-phone="<?= $entry->phone_number; ?>" data-email="<?= $entry->email; ?>"><i class="fas fa-pencil-alt"></i> Edit</button>
                                                    <button class="btn btn-danger btn-sm delete-btn" data-id="<?= $entry->book_id; ?>"><i class="fas fa-trash"></i> Delete</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->


            <!-- Bootstrap Modal for Editing -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="edit-id">
                            <label for="edit-phone-name">Name:</label>
                            <input id="edit-phone-name" class="form-control">
                            <label for="edit-phone-number">Phone Number:</label>
                            <input id="edit-phone-number" class="form-control">
                            <label for="edit-email">Email:</label>
                            <input id="edit-email" class="form-control">
                            <label for="edit-image">Image:</label>
                            <input type="file" name="editimage" id="edit-image" class="form-control">
                            <div id="imagePreview2" class="mt-2">
                                <img class="image-preview__image2" src="" alt="Image preview" style="display:none; width: 100px;">
                                <span class="image-preview__default-text2">No image uploaded</span>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="saveEditBtn">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- DataTables JavaScript -->

        <script>
            $(document).ready(function() {
                $('#record_table').DataTable();

                // Edit button click event
                $('#record_table').on('click', '.edit-btn', function() {
                    var id = $(this).data('id');
                    var name = $(this).data('name');
                    var phone = $(this).data('phone');
                    var email = $(this).data('email');
                    var image = $(this).data('image');

                    // Set values in the edit modal
                    $('#edit-id').val(id);
                    $('#edit-phone-name').val(name);
                    $('#edit-phone-number').val(phone);
                    $('#edit-email').val(email);
                    

                    // Display current image
                    if (image) {
                        var baseUrl = '<?= base_url("assets/img/phonebook/"); ?>';
                        $('#imagePreview2 .image-preview__image2').attr('src', baseUrl + image).show();
                        $('#imagePreview2 .image-preview__default-text2').hide();
                    } else {
                        $('#imagePreview2 .image-preview__image2').hide();
                        $('#imagePreview2 .image-preview__default-text2').show();
                    }

                    // Show the modal
                    $('#editModal').modal('show');
                });

                // File input change event
                $('#edit-image').on('change', function() {
                    const file2 = this.files[0];
                    const reader2 = new FileReader();

                    if (file2) {
                        reader2.onload = function(event) {
                            $('#imagePreview2 .image-preview__image2').attr('src', event.target.result).show();
                            $('#imagePreview2 .image-preview__default-text2').hide();
                        };
                        reader2.readAsDataURL(file2);
                    } else {
                        $('#imagePreview2 .image-preview__image2').hide();
                        $('#imagePreview2 .image-preview__default-text2').show();
                    }
                });

                // Save changes button click event
                $('#saveEditBtn').on('click', function() {
                    var id = $('#edit-id').val();
                    var name = $('#edit-phone-name').val();
                    var phone = $('#edit-phone-number').val();
                    var email = $('#edit-email').val();
                    var imageFile = $('#edit-image')[0].files[0]; // Get the selected file

                    var formData = new FormData();
                    formData.append('id', id);
                    formData.append('name', name);
                    formData.append('phone', phone);
                    formData.append('email', email);
                    if (imageFile) {
                        formData.append('image', imageFile);
                    }

                    $.ajax({
                        url: '<?= site_url('record/update'); ?>',
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            $('#editModal').modal('hide');

                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Record updated successfully',
                                    timer: 1000,
                                    showConfirmButton: false
                                }).then(function() {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Update failed',
                                    text: 'Unable to update the record. Please try again.'
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Server Error',
                                text: 'An error occurred while updating the record.'
                            });
                        }
                    });
                });

                // Delete button click event
                $('#record_table').on('click', '.delete-btn', function() {
                    var id = $(this).data('id');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Do you want to delete this record?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '<?= site_url('record/delete'); ?>/' + id,
                                method: 'GET',
                                dataType: 'json',
                                success: function(response) {
                                    if (response.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Deleted!',
                                            text: 'Record has been deleted.',
                                            timer: 1000,
                                            showConfirmButton: false
                                        }).then(function() {
                                            location.reload();
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Delete failed',
                                            text: 'Unable to delete the record. Please try again.'
                                        });
                                    }
                                },
                                error: function() {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Server Error',
                                        text: 'An error occurred while deleting the record.'
                                    });
                                }
                            });
                        }
                    });
                });
            });
        </script>

</body>

</html>