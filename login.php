<?php session_start(); ?>
<?php include dirname(__FILE__) . '/layouts/public_header.php'; ?>

<div class="row justify-content-center w-100 vh-100">
    <div class="col-4 my-auto">
        <div class="card">
            <div class="card-body">
                <h2 class="h2 text-center mb-4">Log Masuk</h2>
                <form action="//<?php echo $_SERVER['HTTP_HOST'] ?>/auth/login.php" method="POST" autocomplete="off"
                    novalidate>
                    <div class="mb-3">
                        <label class="form-label">Alamat Emel</label>
                        <input type="email" name="email"
                            class="form-control <?php echo isset($_SESSION['errors']['email']) ? 'is-invalid' : '' ?>"
                            placeholder="your@email.com" autocomplete="off">
                        <?php if (isset($_SESSION['errors']['email'])): ?>
                            <div class="invalid-feedback"><?php echo $_SESSION['errors']['email'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">
                            Kata Laluan
                            <span class="form-label-description">
                                <a href="#">Lupa kata laluan?</a>
                            </span>
                        </label>
                        <input type="password" name="password"
                            class="form-control <?php echo isset($_SESSION['errors']['password']) ? 'is-invalid' : '' ?>"
                            autocomplete="off">
                        <?php if (isset($_SESSION['errors']['password'])): ?>
                            <div class="invalid-feedback"><?php echo $_SESSION['errors']['password'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Log Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include dirname(__FILE__) . '/layouts/public_footer.php'; ?>