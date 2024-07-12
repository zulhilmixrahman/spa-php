<?php include dirname(__FILE__) . '/../auth/validator.php'; ?>
<?php include dirname(__FILE__) . '/../layouts/header.php'; ?>
<?php include dirname(__FILE__) . '/../db.php'; ?>
<?php $moduleURL = $_SERVER['HTTP_HOST'] . '/' . basename(__DIR__); ?>

<div class="mb-3 d-flex">
    <h1>Senarai Kategori</h1>
    <a class="btn btn-primary ms-auto" href="//<?php echo $moduleURL ?>/create.php">
        Tambah
    </a>
</div>

<?php
$stmt = $dbCon->prepare("SELECT * FROM categories WHERE is_active = 1");
$stmt->execute();
?>
<?php if ($stmt->rowCount() > 0): ?>
    <?php $results = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>

    <table class="table table-bordered table-striped">
        <tr class="table-dark">
            <th>Bil</th>
            <th>Kategori</th>
            <th>Tindakan</th>
        </tr>
        <?php $bil = 1; ?>
        <?php foreach ($results as $row): ?>
            <tr>
                <td><?php echo $bil++ ?></td>
                <td><?php echo $row['name'] ?></td>
                <td class="text-center">
                    <a class="btn btn-warning btn-sm" 
                    href="//<?php echo $moduleURL ?>/edit.php?id=<?php echo $row['id'] ?>">
                        Kemas kini
                    </a>
                    <a class="btn btn-danger btn-sm" 
                    href="//<?php echo $moduleURL ?>/destroy.php?id=<?php echo $row['id'] ?>"
                        onClick="return confirm('Anda pasti untuk hapus rekod?')">
                        Hapus
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<?php
// echo 'HTTP_HOST => &nbsp; ' . $_SERVER['HTTP_HOST'] . '<br>';
// echo '__DIR__ => &nbsp; ' . __DIR__ . '<br>';
// echo 'basename() => &nbsp; ' . basename(__DIR__) . '<br>';
// echo '$moduleURL => &nbsp; ' . $moduleURL . '<br>';
?>

<?php include dirname(__FILE__) . '/../layouts/footer.php'; ?>