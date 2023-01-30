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
                            <!-- content here -->
                            <h1>Blank Page</h1>
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
</script>
<?= $this->endSection(); ?>