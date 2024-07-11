<?php include dirname(__FILE__) . '/../layouts/header.php'; ?>
<?php include dirname(__FILE__) . '/../db.php'; ?>
<?php $moduleURL = $_SERVER['HTTP_HOST'] . '/' . basename(__DIR__); ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Pengguna</h3>
    </div>
    <form action="//<?php echo $moduleURL ?>/store.php" method="POST">
        <div class="card-body">
            <div class="mb-3 row">
                <label class="col-form-label col-2">Nama Penuh</label>
                <div class="col">
                    <input type="text" name="name" class="form-control">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-form-label col-2">Emel</label>
                <div class="col-4">
                    <input type="email" name="email" class="form-control">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-form-label col-2">Password</label>
                <div class="col-4">
                    <input type="text" name="password" class="form-control">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-form-label col-2">Bahagian</label>
                <div class="col-6">
                    <?php
                    $stmt = $dbCon->prepare("SELECT * FROM departments");
                    $stmt->execute();
                    ?>
                    <select class="form-select" name="department">
                        <option selected>-- Pilihan --</option>
                        <?php
                        if ($stmt->rowCount() > 0):
                            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($results as $data): ?>
                                <option value="<?php echo $data['id'] ?>">
                                    <?php echo $data['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
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