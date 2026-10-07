<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>

<nav>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('/tasks') ?>">Task List</a> |
    <a href="<?= base_url('/profile') ?>">Profile</a> |
    <a href="<?= base_url('/about') ?>">About</a> |
    <a href="<?= base_url('/logout') ?>">Logout</a>
</nav>

<hr>

<h1>Edit Task</h1>

<?php if (isset($validation)): ?>
    <div>
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<form action="<?= base_url('/tasks/update/' . $task['id']) ?>" method="post">

    <?= csrf_field() ?>

    <p>
        <label>Title:</label><br>
        <input
            type="text"
            name="title"
            value="<?= esc(old('title', $task['title'])) ?>"
        >
    </p>

    <p>
        <label>Status:</label><br>

        <?php $status = old('status', $task['status']); ?>

        <select name="status">
            <option value="pending"
                <?= $status === 'pending' ? 'selected' : '' ?>>
                Pending
            </option>

            <option value="completed"
                <?= $status === 'completed' ? 'selected' : '' ?>>
                Completed
            </option>
        </select>
    </p>

    <p>
        <label>Task Date:</label><br>
        <input
            type="date"
            name="task_date"
            value="<?= esc(old('task_date', $task['task_date'])) ?>"
        >
    </p>

    <button type="submit">Update Task</button>

</form>

</body>
</html>