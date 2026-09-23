<!DOCTYPE html>
<html>
<head>
    <title>Tasks for Today</title>
</head>
<body>

    <nav>
        <a href="<?= base_url('/') ?>">Home</a> |
        <a href="<?= base_url('/tasks') ?>">Task List</a> |
        <a href="<?= base_url('/profile') ?>">Profile</a> |
        <a href="<?= base_url('/about') ?>">About</a>
    </nav>

    <hr>

    <h1>Tasks for Today</h1>

    <table border="1">
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Task Date</th>
        </tr>

        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= $task['title'] ?></td>
                <td><?= $task['status'] ?></td>
                <td><?= $task['task_date'] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>