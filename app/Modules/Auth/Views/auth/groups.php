<?= $this->extend(dashboard_view('_layouts')); ?>
<?= $this->section("content") ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 p-0">
            <h2 class="mb-2 page-title"><?= $title ?></h2>
            <div class="row my-2">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <table class="table datatables" id="dataTable-1">
                                <thead>
                                    <tr>
                                        <th>Nama Group</th>
                                        <th>Deskripsi</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($groups as $group) : ?>
                                        <tr>
                                            <td><?= $group->name ?></td>
                                            <td><?= $group->description ?></td>

                                            <td class="text-center">
                                                <div>
                                                    <a href="<?= base_url("auth/edit_group/" . $group->id) ?>"><button type="button" class="btn mb-2 btn-info"><span class="fe fe-edit fe-16 mr-2"></span>Edit</button></a>
                                                    <a href="<?= base_url("auth/delete_group/" . $group->id) ?>" class="btn-delete"><button type="button" class="btn mb-2 btn-danger"><span class="fe fe-trash fe-16 mr-2"></span>Delete</button></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $message ?>

<?= $this->endSection() ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="<?= base_url('modules_assets/dashboard/css/dataTables.bootstrap4.css') ?>">
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src='<?= base_url('modules_assets/dashboard/js/jquery.dataTables.min.js') ?>'></script>
<script src='<?= base_url('modules_assets/dashboard/js/dataTables.bootstrap4.min.js') ?>'></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('#dataTable-1').DataTable({
        autoWidth: true,
        "lengthMenu": [
            [10, 15, 25, -1],
            [10, 15, 25, "All"]
        ]
    });

    $('.btn-delete').on('click', function(e) {
        e.preventDefault();
        var urlToRedirect = e.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        Swal.fire({
            title: 'Yakin menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: `Hapus`,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = urlToRedirect;
            }
        });
    });
</script>
<?= $this->endSection(); ?>