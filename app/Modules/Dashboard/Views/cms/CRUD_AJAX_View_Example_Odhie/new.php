<?= $this->extend(dashboard_view('_layouts')); ?>

<?= $this->section('css'); ?>
<style>
    .image-thumbnail {
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
                            <!-- content here -->
                            <form id="create-form" method="post" enctype="multipart/form-data">
                                <div>
                                    <label for="name">Name:</label>
                                    <input type="text" id="name" name="name">
                                </div>
                                <div>
                                    <label for="email">Email:</label>
                                    <input type="email" id="email" name="email">
                                </div>
                                <div>
                                    <label for="message">Message:</label>
                                    <textarea id="message" name="message"></textarea>
                                </div>
                                <div>
                                    <label for="image">Image:</label>
                                    <img id="image-thumbnail" src="#" alt="Image thumbnail" class="image-thumbnail">
                                    <input type="file" id="image" name="image">
                                </div>
                                <div>
                                    <button type="submit">Save</button>
                                </div>
                            </form>
                            <!-- content here -->
                            <!-- content here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>
    $("#main_title").append(' | <?= $title ?>')

    $(document).ready(function() {

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

        $("#create-form").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: "<?= base_url('example_create') ?>",
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        title: "Success",
                        text: "Record has been saved successfully!",
                        icon: "success"
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: "Error",
                        text: "An error occurred while saving the record. Please try again.",
                        icon: "error"
                    });
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>