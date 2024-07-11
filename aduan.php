<?php include dirname(__FILE__) . '/db.php'; ?>
<?php include dirname(__FILE__) . '/layouts/public_header.php'; ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Borang Aduan ICT</h3>
    </div>
    <form action="/aduan_store.php" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="mb-3 row">
                <label class="col-form-label col-3">Maklumat pengadu <span class="text-danger">*</span></label>
                <div class="col">
                    <input type="name" name="name" class="form-control" placeholder="Nama Penuh" required>
                </div>
                <div class="col-4">
                    <input type="email" name="email" class="form-control" placeholder="Emel Rasmi" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-form-label col-3">Bahagian pengadu <span class="text-danger">*</span></label>
                <div class="col-6">
                    <?php
                    $stmt = $dbCon->prepare("SELECT * FROM departments");
                    $stmt->execute();
                    ?>
                    <select class="form-select" name="department_id">
                        <option selected>-- Pilihan Bahagian --</option>
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

            <div class="mb-3 row">
                <label class="col-form-label col-3">Lokasi/Aras Bangunan <span class="text-danger">*</span></label>
                <div class="col-6">
                    <input type="text" name="location" class="form-control"
                        placeholder="Contoh: Bilik Latihan Daisy, Aras 8" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-form-label col-3">No untuk dihubungi <span class="text-danger">*</span></label>
                <div class="col-3">
                    <input type="text" name="contact_no" class="form-control"
                        placeholder="Extension atau No Telefon Bimbit" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-form-label col-3">Kategori aduan <span class="text-danger">*</span></label>
                <div class="col-4">
                    <?php
                    $stmt = $dbCon->prepare("SELECT * FROM categories WHERE is_active = 1");
                    $stmt->execute();
                    ?>
                    <select class="form-select" name="category_id">
                        <option selected>-- Kategori Aduan --</option>
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

            <div class="mb-3 row">
                <label class="col-form-label col-3">Tajuk aduan</label>
                <div class="col">
                    <input type="text" name="title" class="form-control">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-form-label col-3">Butiran aduan</label>
                <div class="col">
                    <textarea name="detail" class="form-control" rows="5"></textarea>
                </div>
            </div>

            <div class="row">
                <label class="col-form-label col-3">Lampiran</label>
                <div class="col-6">
                    <input type="file" name="attachment" class="form-control">
                </div>
            </div>

            <div class="mb-3 row">
                <div class="offset-3 col text-info">
                    ** Lampiran yang dibenarkan: (.jpg/.jpeg/.png/.doc/.docx/.pdf)<br>
                    ** Max saiz lampiran: 2MB
                </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="/index.php" class="btn btn-dark">Laman Utama</a>
            <button type="submit" class="btn btn-info">Hantar Aduan</button>
        </div>
    </form>
</div>

<?php include dirname(__FILE__) . '/layouts/footer.php'; ?>