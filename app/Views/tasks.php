<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
</head>
<body>

    <nav>
        <a href="<?= base_url('/') ?>">Home</a> |
        <a href="<?= base_url('/tasks') ?>">Task List</a> |
        <a href="<?= base_url('/profile') ?>">Profile</a> |
        <a href="<?= base_url('/about') ?>">About</a>
        <?php if (session()->get('logged_in')): ?>
            | <a href="<?= base_url('/logout') ?>">Logout</a>
        <?php else: ?>
            | <a href="<?= base_url('/login') ?>">Login</a>
        <?php endif; ?>
    </nav>

    <hr>                                 

    <h1>Task List</h1>

    <?php if (session()->get('logged_in')): ?>
    <p>
        <a href="<?= base_url('/tasks/new') ?>">Add New Task</a>
    </p>
    <?php endif; ?>

    <table border="1">
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Task Date</th>
            <th>Action</th>
        </tr>

        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= $task['title'] ?></td>
                <td><?= $task['status'] ?></td>
                <td><?= $task['task_date'] ?></td>
                <td><?php if (session()->get('logged_in')): ?>
                <a href="<?= base_url('/tasks/edit/' . $task['id']) ?>">Edit</a>
                <form action="<?= base_url('/tasks/delete/' . $task['id']) ?>"method="post"style="display:inline;"onsubmit="return confirm('Are you sure you want to delete this task?');">
                <?= csrf_field() ?>
                <button type="submit">Delete</button></form><?php endif; ?></td>
            </tr>

            
        <?php endforeach; ?>

    </table>

</body>
</html>