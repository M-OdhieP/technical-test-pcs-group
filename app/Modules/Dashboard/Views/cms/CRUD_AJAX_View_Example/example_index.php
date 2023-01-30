<?= $this->extend(dashboard_view('_layouts')); ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="<?= base_url('modules_assets/dashboard/css/dataTables.bootstrap4.css') ?>">
<style>
    .image-thumbnail {
        height: 100px;
        width: 100px;
        object-fit: contain;
        object-position: center;
        margin: 4px 4px 4px 0;
    }

    .image-thumbnail-new-content {
        display: none;
        height: 100px;
        width: 200px;
        object-fit: contain;
        object-position: left bottom;
        margin: 4px 4px 4px 0;
    }
</style>
<?= $this->endSection(); ?>


<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 p-0">
            <h2 class="mb-2 page-title"><?= $title ?></h2>
            <div class="row my-2">
                <div class="col-md-12">
                    <div class="card shadow mb-2">
                        <div class="card-body">
                            <div class=" d-flex  justify-content-end">
                                <button type="button" class="btn mb-2 btn-primary" data-toggle="modal" data-target="#AddContent"><span class="fe fe-plus fe-16 mr-2"></span>Tambah Data</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                            <th>Image</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div class="modal fade" id="AddContent" tabindex="-1" role="dialog" aria-labelledby="AddContentTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form id="create-form" method="post" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="AddContentTitle">New Content</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="name">Name</label>
                                                        <input type="text" id="name" name="name" class="form-control" />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="email">Email</label>
                                                        <input type="email" id="email" name="email" class="form-control" />
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="message">Message</label>
                                                    <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="image">Image</label>
                                                    <img id="image-thumbnail" src="#" alt="Image thumbnail" class="image-thumbnail-new-content">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="image" name="image" />
                                                        <label class="custom-file-label" for="image">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn mb-2 btn-primary">Create</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="EditContent" tabindex="-1" role="dialog" aria-labelledby="EditContentTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form id="edit-form" method="post" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="EditContentTitle">Edit Content</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" id="id_edit" name="id">

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="name">Name</label>
                                                        <input type="text" id="name_edit" name="name" class="form-control" />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="email">Email</label>
                                                        <input type="email" id="email_edit" name="email" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="message">Message</label>
                                                    <textarea class="form-control" id="message_edit" name="message" rows="3"></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="image">Image</label>
                                                    <img id="image-thumbnail_edit" src="#" alt="Image thumbnail" class="image-thumbnail-new-content">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="image_edit" name="image" />
                                                        <label class="custom-file-label" id="file-label-edit" for="image">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn mb-2 btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?= $this->endSection(); ?>

        <?= $this->section('js'); ?>

        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
        <script src='<?= base_url('modules_assets/dashboard/js/jquery.dataTables.min.js') ?>'></script>
        <script src='<?= base_url('modules_assets/dashboard/js/dataTables.bootstrap4.min.js') ?>'></script>
        <script src="<?= base_url("modules_assets/dashboard/custom_assets/custom_validate.js") ?>"></script>

        <script>
            $("#main_title").append(' | <?= $title ?>')

            $(function() {
                $('#dataTable-1').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "lengthMenu": [
                        [10, 15, 25, -1],
                        [10, 15, 25, "All"]
                    ],
                    "responsive": true,
                    "ajax": {
                        "url": '<?= base_url('example_get_all_data') ?>',
                        "type": "POST",
                        "dataType": "json",
                        async: "true"
                    }
                });
            });



            $("#create-form").submit(function(e) {
                e.preventDefault();
                if ($(this).valid()) {
                    var formData = new FormData(this)

                    $.ajax({
                        url: "<?= base_url('example_create') ?>",
                        type: "post",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {

                            $('#AddContent').modal('hide');
                            $('#create-form')[0].reset();
                            $('.custom-file-label').html('')
                            $("#image-thumbnail").removeAttr("src").css("display", "none");
                            alert_success("Record has been saved successfully!");
                            // get_all_data()
                            $('#dataTable-1').DataTable().ajax.reload(null, false).draw(false);
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: "Error",
                                text: "An error occurred while saving the record. Please try again.",
                                icon: "error"
                            });
                        }
                    });
                } else {
                    alert_error('Validation Error')
                }
            });


            $("#edit-form").submit(function(e) {
                e.preventDefault();
                if ($(this).valid()) {
                    var formData = new FormData(this)
                    $.ajax({
                        url: "<?= base_url('example_update') ?>",
                        type: "post",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            $('#EditContent').modal('hide');
                            alert_success("Record has been Update successfully!");
                            // get_all_data()
                            $('#dataTable-1').DataTable().ajax.reload(null, false).draw(false);
                            // console.log(response);
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: "Error",
                                text: "An error occurred while saving the record. Please try again.",
                                icon: "error"
                            });
                        }
                    });

                } else {
                    alert_error('Validation Error')
                }
            });


            function delete_btn(id) {
                // Send the delete request to the controller
                Swal.fire({
                    title: 'Are you sure?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: 'grey',
                    confirmButtonText: 'Delete'
                }).then((result) => {
                    // If the user confirms, send a DELETE request to the server
                    if (result.value) {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url('example_delete') ?>/' + id,
                            success: function(response) {
                                // Handle the response
                                alert_success("Record has been Deleted!")
                                // get_all_data()
                                $('#dataTable-1').DataTable().ajax.reload(null, false).draw(false);
                                console.log(response);
                            }
                        })
                    }
                });
            };

            function edit_btn(id) {
                $('#edit-form').trigger('reset');
                $.get("<?= base_url('example_get_one') ?>/" + id,
                    function(response) {
                        var data = response.item
                        $('#EditContent').modal('show');
                        $("#id_edit").val(data.id)
                        $("#name_edit").val(data.name)
                        $("#email_edit").val(data.email)
                        $("#message_edit").html(data.message)
                        $('#file-label-edit').text("Choose File to Change the image");

                        if (data.image) {
                            $("#image-thumbnail_edit")
                                .css('display', 'block')
                                .attr('src', '<?= base_url('uploaded_file/example_upload') ?>/' + data.image)
                        }
                    });
            };



            const alert_success = (message) => Swal.fire({
                title: "Success",
                text: message,
                icon: "success",
                showConfirmButton: false,
                timer: 1500
            });

            const alert_error = (message) => Swal.fire({
                title: "Error",
                text: message,
                icon: "error"
            });


            // $('.custom-file-input').on('change', function() {
            //     let fileName = $(this).val().split('\\').pop();
            //     $(this).next('.custom-file-label').html(fileName);
            // });

            $('.custom-file-input').on('change', function() {
                const fileInput = this;
                const fileName = fileInput.files[0].name;
                $(fileInput).next('.custom-file-label').text(fileName);
            });

            $("#image").change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("#image-thumbnail").attr("src", e.target.result);
                        $("#image-thumbnail").css("display", "block");
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
            $("#image_edit").change(function() {
                // Get the file name
                var fileName = $(this).val();

                // Check if the file has an image file extension
                if (/\.(jpe?g|png|gif)$/i.test(fileName)) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("#image-thumbnail_edit").attr("src", e.target.result);
                        $("#image-thumbnail_edit").css("display", "block");
                    }
                    reader.readAsDataURL(this.files[0]);
                } else {
                    // Display an error message or do something else if the file is not an image
                }
            });


            $(document).ready(function() {
                // get_all_data()




            });
        </script>
        <?= $this->endSection(); ?>