<!DOCTYPE html>
<html>
<head>
    <title>New Task</title>
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

<h1>New Task</h1>

<?php if (isset($validation)): ?>
    <div>
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<form action="<?= base_url('/tasks/create') ?>" method="post">

    <?= csrf_field() ?>

    <p>
        <label>Title:</label><br>
        <input
            type="text"
            name="title"
            value="<?= old('title') ?>"
        >
    </p>

    <p>
        <label>Status:</label><br>

        <select name="status">
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
        </select>
    </p>

    <p>
        <label>Task Date:</label><br>

        <input
            type="date"
            name="task_date"
            value="<?= old('task_date') ?>"
        >
    </p>

    <button type="submit">Create Task</button>

</form>

</body>
</html>