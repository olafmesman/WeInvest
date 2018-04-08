<!DOCTYPE html>
<html>
<?php include 'components/head.php'; ?>
<body>
<?php include 'components/header.php'; ?>

<main>

	<?php include 'components/user-block.php'; ?>
    <?php
    foreach (fetch_all("SELECT * FROM posts WHERE entrepreneurs_id = ".$user['id']) as &$post) {
        include 'components/post-block.php';
    }
    ?>

</main>

<script src="/dist/app.js"></script>
</body>
</html>
