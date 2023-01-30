<?= $this->extend(dashboard_view('_layouts')); ?>

<?= $this->section('css'); ?>
<style>
    .setting-img {
        height: 100px;
        width: 200px;
        object-fit: contain;
        object-position: left top;
        margin: 4px 4px 8px 0;
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
                            <form action="<?= base_url("dashboard/setting/update") ?>" id="setting_form" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="group_name">App Name</label>
                                        <input type="text" class="form-control" name="app_name" id="app_name" value="<?= $item->app_name ?>">
                                    </div>



                                    <div class="form-group mb-3 col-md-4 ">
                                        <label for="favicon">FavIcon</label>
                                        <br>
                                        <img src="<?= base_url("uploaded_file\settings" . DIRECTORY_SEPARATOR . $item->favicon) ?>" class="setting-img">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="favicon" name="favicon" />
                                            <label class="custom-file-label" for="favicon">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label for="Logo">Logo</label>
                                        <br>
                                        <img src="<?= base_url("uploaded_file\settings" . DIRECTORY_SEPARATOR . $item->logo) ?>" class="setting-img">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="Logo" name="logo" />
                                            <label class="custom-file-label" for="Logo">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label for="customFile">Login Image</label>
                                        <br>
                                        <img src="<?= base_url("uploaded_file\settings" . DIRECTORY_SEPARATOR . $item->login_image) ?>" class="setting-img">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="login_image" />
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?= $item->id ?>" />

                                <button type="submit" id="setting_btn" class="btn btn-primary">Update</button>

                            </form>

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

<script>
    if ($("#setting_form").length > 0) {
        $("#setting_form").validate({
            rules: {
                app_name: {
                    required: true,
                    minlength: 4,
                },
                group_description: {
                    required: true,

                },
                login_image: {
                    extension: "jpg,jpeg,png",
                    filesize: 3145728 // <- 3 MB
                },
                logo: {
                    extension: "jpg,jpeg,png",
                    filesize: 3145728 // <- 3 MB
                },
                favicon: {
                    extension: "jpg,jpeg,png",
                    filesize: 3145728 // <- 3 MB
                }

            },
            messages: {
                name: {
                    required: "App Name is required",
                    minlength: jQuery.validator.format("at least {0} characters are necessary")
                },
            },
        })
    }

    $.validator.addMethod('filesize', function(value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, 'File size must be less than {0} bytes');

    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $("#main_title").append(' | <?= $title ?>')
</script>
<?= $this->endSection(); ?>