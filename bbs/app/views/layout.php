<?php require_once __DIR__ . '/../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>掲示板</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <header class="header">
        <h1>ねこねこ掲示板</h1>
    </header>

    <div class="about">
        <p>この掲示板は猫についてならなんでも書き込んで良い掲示板です</p>
        <img class="nekoimg" src="https://cataas.com/cat" alt="" width="70">
    </div>

    <?php if (!empty($errors)): ?>
        <ul style="color:red;">
            <?php foreach ($errors as $error): ?>
                <li><?= str2html($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>


    <?php include __DIR__ . '/index.php'; ?>
</body>

</html>