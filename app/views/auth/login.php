<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="auth-card">

    <h2>Login</h2>

    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert error">
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert success">
            <?= $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="/studenttaskmanager/public/index.php?url=auth/authenticate">
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>

        <button type="submit">Login</button>
    </form>

    <p class="switch">
        Don't have an account?
        <a href="/studenttaskmanager/public/index.php?url=auth/register">Register</a>
    </p>

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>