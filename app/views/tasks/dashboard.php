<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="dashboard-container">

    <div class="dashboard-header">
        <h2>Welcome, <?= $_SESSION['user_name']; ?> 👋</h2>

        <div class="actions">
            <a href="/studenttaskmanager/public/index.php?url=task/add">Add Task</a>
            <a href="/studenttaskmanager/public/index.php?url=auth/logout">Logout</a>
        </div>
    </div>

    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert success">
            <?= $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert error">
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <div class="task-grid">
        <?php if (!empty($tasks)): ?>
            <?php foreach($tasks as $task): ?>
                <div class="task-card">
                    <h3><?= htmlspecialchars($task['title']); ?></h3>

                    <div class="task-actions">
                        <a href="/studenttaskmanager/public/task/edit?id=<?= $task['id'] ?>" class="edit">Edit</a>
                        <a href="/studenttaskmanager/public/task/delete?id=<?= $task['id'] ?>" class="delete">Delete</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="empty">No tasks yet. Add your first task 🚀</p>
        <?php endif; ?>
    </div>

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>