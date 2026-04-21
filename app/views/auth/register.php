<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="auth-card">

    <h2>Register</h2>

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

    <form method="POST" action="/studenttaskmanager/public/index.php?url=auth/store">
        <input type="text" name="name" placeholder="Enter Name" required>
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>

        <button type="submit">Register</button>
    </form>

    <p class="switch">
        Already have an account?
        <a href="/studenttaskmanager/public/auth/login">Login</a>
    </p>

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>