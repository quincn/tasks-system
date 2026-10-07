<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<nav>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('/tasks') ?>">Task List</a> |
    <a href="<?= base_url('/profile') ?>">Profile</a> |
    <a href="<?= base_url('/about') ?>">About</a>
</nav>

<hr>

<h1>Login</h1>

<?php if (isset($validation)): ?>
    <div>
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<?php if (isset($error)): ?>
    <p><?= esc($error) ?></p>
<?php endif; ?>

<form action="<?= base_url('/login') ?>" method="post">

    <?= csrf_field() ?>

    <p>
        <label>Username:</label><br>
        <input
            type="text"
            name="username"
            value="<?= old('username') ?>"
        >
    </p>

    <p>
        <label>Password:</label><br>
        <input
            type="password"
            name="password"
        >
    </p>

    <button type="submit">Login</button>

</form>

</body>
</html>