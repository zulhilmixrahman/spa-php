<?php include dirname(__FILE__) . '/layouts/public_header.php'; ?>

<div class="card">
    <div class="card-body">
        <h2 class="h2 text-center mb-4">Login to your account</h2>
        <form action="//<?php echo $_SERVER['HTTP_HOST'] ?>/auth/login.php" method="POST" autocomplete="off" novalidate>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" placeholder="your@email.com" autocomplete="off">
            </div>
            <div class="mb-2">
                <label class="form-label">
                    Password
                    <span class="form-label-description">
                        <a href="./forgot-password.html">I forgot password</a>
                    </span>
                </label>
                <input type="password" class="form-control" placeholder="Your password" autocomplete="off">
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
        </form>
    </div>
</div>

<?php include dirname(__FILE__) . '/layouts/footer.php'; ?>