<?php include dirname(__FILE__) . '/../layouts/header.php'; ?>
<?php include dirname(__FILE__) . '/../db.php'; ?>
<?php $moduleURL = $_SERVER['HTTP_HOST'] . '/' . basename(__DIR__); ?>

<div class="mb-3 d-flex">
    <h1>Senarai Bahagian</h1>
    <a class="btn btn-primary ms-auto" href="//<?php echo $moduleURL ?>/create.php">
        Tambah
    </a>
</div>

<?php
$stmt = $dbCon->prepare("SELECT * FROM departments");
$stmt->execute();
?>
<?php if ($stmt->rowCount() > 0): ?>
    <?php $results = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>

    <table class="table table-bordered table-striped">
        <tr class="table-dark">
            <th>Bil</th>
            <th>Bahagian</th>
            <th>Kod</th>
            <th>Tindakan</th>
        </tr>
        <?php $bil = 1; ?>
        <?php foreach ($results as $row): ?>
            <tr>
                <td><?php echo $bil++ ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['code'] ?></td>
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

<?php include dirname(__FILE__) . '/../layouts/footer.php'; ?>