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
                                <form action="<?= base_url('create_order') ?>" method="post">
                                    <ul class="list-group list-group-flush border-bottom">
                                        <?php foreach ($summary as $item) : ?>
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p> <?= $item->product_name . ' - ' . $item->product_description ?> <br>
                                                        <?= 'Rp. ' . number_format($item->product_price, 2) ?> </p>
                                                    <div class="d-flex">
                                                        <p>x <?= $item->quantity ?> <br>
                                                            <?= 'Rp. ' . number_format($item->total_each_product_price, 2) ?>
                                                            <?php if ($item->kupon > 0) : ?>
                                                                <span class="badge bg-danger"><?= '+ ' . $item->kupon . 'Kupon' ?> </span>
                                                            <?php endif; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <input type="hidden" name="description[]" value="<?= $item->product_name . ' - ' . $item->product_description . ' x' . $item->quantity ?>">
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php if ($kupon_from_product_total > 0) : ?>
                                        <p class="p-1 m-0">Total Kupon yang didapat dari setiap product diatas Rp. 50.000 <span class="badge bg-danger"> <?= '+ ' . $kupon_from_product_total . ' Kupon' ?> </span></p>
                                    <?php endif; ?>

                                    <?php if ($kupon_from_total_price > 0) : ?>
                                        <p class="p-1 m-0">Total Kupon yang didapat dari total belanja kelipatan Rp. 100.000 <span class="badge bg-danger"> <?= '+ ' . $kupon_from_total_price . ' Kupon' ?> </span></p>
                                    <?php endif; ?>

                                    <div class="d-flex justify-content-between align-items-center p-1 mt-3 border-bottom">
                                        <h5>Total Harga <br>
                                            <?php if ($total_kupon > 0) : ?>
                                                Total Kupon Didapat
                                            <?php endif; ?>
                                        </h5>
                                        <h5> <?= "Rp. " . number_format($total_price, 2) ?> <br>
                                            <?php if ($total_kupon > 0) : ?>
                                                <span class="badge bg-danger"> <?= $total_kupon . ' Kupon' ?> </span>
                                            <?php endif; ?>
                                        </h5>
                                    </div>

                                    <input type="hidden" name="data[total_price]" value="<?= $total_price ?>">
                                    <input type="hidden" name="data[total_kupon]" value="<?= $total_kupon ?>">

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary my-3 col-6">Confirm Checkout</button>
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
<script>
    $("#main_title").append(' | <?= $title ?>')
    $("#summary-menu").css('display', 'block')
    $("#cart-icon-menu").css('display', 'none')
</script>
<?= $this->endSection(); ?>