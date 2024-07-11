<?php
include dirname(__FILE__) . '/../db.php';
$moduleURL = $_SERVER['HTTP_HOST'] . '/' . basename(__DIR__);
$id = (int) $_GET['id'];

$stmt = $dbCon->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($stmt->rowCount() == 0) {
    header('Location: //' . $moduleURL . '/index.php');
}

$data = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php include dirname(__FILE__) . '/../layouts/header.php'; ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Pengguna</h3>
    </div>
    <form action="//<?php echo $moduleURL ?>/update.php?id=<?php echo $data['id'] ?>" method="POST">
        <div class="card-body">
            <div class="mb-3 row">
                <label class="col-form-label col-2">Nama Penuh</label>
                <div class="col">
                    <input type="text" name="name" class="form-control" value="<?php echo $data['name'] ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-form-label col-2">Emel</label>
                <div class="col-4">
                    <input type="email" name="email" class="form-control" value="<?php echo $data['email'] ?>">
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
                            foreach ($results as $dept): ?>
                                <option value="<?php echo $dept['id'] ?>" 
                                <?php echo $data['department_id'] == $dept['id'] ? 'selected' : '' ?>>
                                    <?php echo $dept['name'] ?>
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