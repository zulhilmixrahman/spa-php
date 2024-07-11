<?php
include dirname(__FILE__) . '/../db.php';
$moduleURL = $_SERVER['HTTP_HOST'] . '/' . basename(__DIR__);
$id = (int) $_GET['id'];

$stmt = $dbCon->prepare("SELECT * FROM departments WHERE id = :id");
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
        <h3 class="card-title">Kemas kini Bahagian</h3>
    </div>
    <form action="//<?php echo $moduleURL ?>/update.php?id=<?php echo $data['id'] ?>" method="POST">
        <div class="card-body">
            <div class="mb-3 row">
            <div class="mb-3 row">
                <label class="col-form-label col-2">Kod</label>
                <div class="col-4">
                    <input type="text" name="code" class="form-control" value="<?php echo $data['code'] ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-form-label col-2">Bahagian</label>
                <div class="col-8">
                    <input type="text" name="name" class="form-control" value="<?php echo $data['name'] ?>">
                </div>
            </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="//<?php echo $moduleURL ?>/index.php" class="btn btn-outline-secondary">Kembali</a>
            <button type="submit" class="btn btn-warning">Kemas kini</button>
        </div>
    </form>
</div>

<?php include dirname(__FILE__) . '/../layouts/footer.php'; ?>