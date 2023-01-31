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
                                <div class="row">
                                    <?php foreach ($products as $product) : ?>
                                        <div class="col-md-4">
                                            <div class="card mb-3">
                                                <?php if ($product->image == '') : ?>
                                                    <img src=" https://pmb.pnc.ac.id/wp-content/themes/edubin/assets/images/course-ph.png" class="card-img-top" alt="<?= $product->name ?>">
                                                <?php else : ?>
                                                    <img src="<?= base_url('uploaded_file/product') . '/' . $product->image ?>" class="card-img-top product-img" alt="<?= $product->name ?>">
                                                <?php endif; ?>
                                                <div class="card-body">
                                                    <h4 class="card-title m-0"><?= $product->name ?></h4>
                                                    <p class="card-text mb-0"><?= $product->description ?></p>
                                                    <p class="card-text">Rp. <?= number_format($product->price, 2) ?></p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <button type="button" class="btn btn-sm btn-primary" onclick="addToCart(<?= $product->id ?>,  <?= getUserId() ?> )"><i class="fe fe-plus fe-16"></i> add to cart</button>

                                                        <p class="card-text">Quantity: <?= $product->quantity ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <?php if (isset($pager)) : ?>
                                    <div class="d-flex justify-content-center">
                                        <?= $pager->links('products', 'custom_pagination') ?>
                                    </div>
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
    $("#product-menu").addClass('active')
</script>
<?= $this->endSection(); ?>

<?= $this->section('css'); ?>
<style>
    .product-img {
        height: 200px;
        border: solid 2px black;
        object-fit: cover;
    }
</style>
<?= $this->endSection(); ?>