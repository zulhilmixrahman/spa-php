<?php include dirname(__FILE__) . '/../layouts/header.php'; ?>
<?php $moduleURL = $_SERVER['HTTP_HOST'] . '/' . basename(__DIR__); ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Bahagian</h3>
    </div>
    <form action="//<?php echo $moduleURL ?>/store.php" method="POST">
        <div class="card-body">
            <div class="mb-3 row">
                <label class="col-form-label col-2">Kod</label>
                <div class="col-4">
                    <input type="text" name="code" class="form-control">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-form-label col-2">Bahagian</label>
                <div class="col-8">
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="//<?php echo $moduleURL ?>/index.php" class="btn btn-outline-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

<?php include dirname(__FILE__) . '/../layouts/footer.php'; ?>