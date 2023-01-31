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
                            <div class="container">
                                <?php if ($history) : ?>

                                    <ul class="list-group list-group-flush border-bottom">
                                        <?php foreach ($history as $item) : ?>
                                            <li class="list-group-item mb-3">

                                                <div class="d-flex justify-content-between align-items-center border-bottom">
                                                    <p class="mb-0"> <strong><?= date("H:i:s d-m-Y", strtotime($item->created_at)); ?></strong></p>
                                                    <p class="mb-0"> <span class="badge badge-pill <?= ($item->status == 'Open') ? 'badge-primary' : 'badge-info' ?> p-2"><?= $item->status ?></span> </p>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <?php foreach ($item->description as $description) : ?>
                                                            <p class="m-0"> <?= $description ?> </p>

                                                        <?php endforeach; ?>

                                                    </div>
                                                    <div>
                                                        <p class="m-0">Total Harga: <?= 'Rp. ' . number_format($item->total_price, 2) ?></p>
                                                        <?php if ($item->total_kupon > 0) : ?>
                                                            <p class="m-0">Total Kupon: <?= $item->total_kupon  ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>

                                <?php else : ?>
                                    <h4 class="text-center">Anda belum melakukan Order</h4>
                                <?php endif; ?>
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
<script>
    $("#main_title").append(' | <?= $title ?>')
    $("#history-menu").addClass('active')
</script>
<?= $this->endSection(); ?>