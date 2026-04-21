<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="form-card">

    <h2>Add New Task</h2>

    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert error">
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="/studenttaskmanager/public/task/store">
        <input type="text" name="title" placeholder="Enter task title" required>

        <button type="submit">Add Task</button>
    </form>

    <a href="/studenttaskmanager/public/task/dashboard" class="back-link">← Back to Dashboard</a>

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>