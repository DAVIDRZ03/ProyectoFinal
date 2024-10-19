<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>  <?= $this->renderSection("title")?>  </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

<nav style="display: flex; align-items: center; gap: 15px;">

    <a href="<?= url_to('/') ?>">Home</a>

    <?php if (auth()->loggedIn()): ?>

        <span>Hello <?= esc(auth()->user()->first_name) ?></span>

        <a href="<?= url_to('articles') ?>">Articles</a>

        <?php if (auth()->user()->inGroup("admin")): ?>
             <a href="<?= url_to('admin/users') ?>">Users</a>
        <?php endif; ?>

        <a href="<?= url_to('logout') ?>">Log out</a>

    <?php else: ?>

        <a href="<?= url_to('login') ?>">Log in</a>

    <?php endif; ?>

</nav>

<?php if (session()->has("message")): ?>

    <p><?= session("message")?></p>

<?php endif; ?>

<?php if (session()->has("error")): ?>

    <p><?= session("error") ?></p>

<?php endif; ?>

<?= $this->renderSection("content") ?>

</body>
</html>