<?php global $title, $page; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/bahnschrift" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css" />
    <title><?= $title; ?></title>
</head>
<body>
    <?php require 'templates/components/header.php'; ?>
    <main>
        <?php if(isset($_GET['error'])): ?>
            <div class="error">
                <p><?= $_GET['error']; ?></p>
            </div>
        <?php endif ?>
        <?php require $page ?>
    </main>
    <?php require 'templates/components/footer.php'; ?>
</body>
</html>