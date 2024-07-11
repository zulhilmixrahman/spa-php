<?php include dirname(__FILE__) . '/auth/validator.php'; ?>
<?php include dirname(__FILE__) . '/layouts/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Dashboard</h3>
    </div>
    <div class="card-body">
        <p>This is dashboard page</p>
        <code><?php print_r($_SESSION) ?></code>
    </div>
</div>

<?php include dirname(__FILE__) . '/layouts/footer.php'; ?>