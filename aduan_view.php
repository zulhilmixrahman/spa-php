<?php session_start(); ?>
<?php include dirname(__FILE__) . '/layouts/public_header.php'; ?>
<?php include dirname(__FILE__) . '/db.php'; ?>
<?php
$ticket_no = $_GET['t'];

$stmt = $dbCon->prepare("SELECT 
    complaints.*, categories.name AS category, departments.name AS department 
    FROM complaints 
    JOIN departments ON complaints.department_id = departments.id
    JOIN categories ON complaints.category_id = categories.id
    WHERE complaints.ticket_no = :ticket
");
$stmt->bindParam(':ticket', $ticket_no);
$stmt->execute();

if ($stmt->rowCount() == 0) {
    header('Location: /aduan.php');
}

$data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="row justify-content-center my-auto w-100">
    <div class="col-12 col-md-10">
        <div class="alert alert-success alert-important text-center">
            Terima kasih. Aduan telah diterima oleh bahagian.
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Maklumat Aduan ICT</h3>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <div class="col-3">No Tiket</div>
                    <div class="col"><?php echo $data['ticket_no'] ?></div>
                </div>

                <div class="mb-3 row">
                    <div class="col-3">Maklumat pengadu</div>
                    <div class="col"><?php echo $data['name'] ?></div>
                </div>

                <div class="mb-3 row">
                    <div class="offset-3 col-auto"><?php echo $data['email'] ?></div>
                    <div class="col-auto">|</div>
                    <div class="col-auto"><?php echo $data['department'] ?></div>
                </div>

                <div class="mb-3 row">
                    <div class="col-3">Lokasi/Aras Bangunan</div>
                    <div class="col"><?php echo $data['location'] ?></div>
                </div>

                <div class="mb-3 row">
                    <div class="col-3">No untuk dihubungi</div>
                    <div class="col"><?php echo $data['contact_no'] ?></div>
                </div>

                <div class="mb-3 row">
                    <div class="col-3">Kategori aduan</div>
                    <div class="col"><?php echo $data['category'] ?></div>
                </div>

                <div class="mb-3 row">
                    <div class="col-3">Tajuk aduan</div>
                    <div class="col"><?php echo $data['title'] ?></div>
                </div>

                <div class="mb-3 row">
                    <div class="col-3">Butiran aduan</div>
                    <div class="col"><?php echo $data['detail'] ?></div>
                </div>

                <div class="row">
                    <div class="col-3">Lampiran</div>
                    <div class="col-6">
                        <a href="download.php?t=<?php echo $data['ticket_no'] ?>" target="_blank" class="btn btn-dark">
                            Muat turun
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include dirname(__FILE__) . '/layouts/public_footer.php'; ?>