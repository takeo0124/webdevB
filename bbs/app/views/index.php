<form action="" method="post" enctype="multipart/form-data">
    <p class="name">なまえ<br><input type="text" name="name" /></p>
    <p class="age">ねんれい<br><input type="number" name="age" /></p>

    <p class="comment">こめんと<br><textarea name="comment" rows="4" cols="40"></textarea></p>
    <p>
        <input type="submit" value="投稿">
    </p>
</form>

<img class="kakikomi_img" src="./images/kakikomi01.png" alt="">

<?php
function human_to_cat_age($human_age)
{
    if (!is_numeric($human_age) || $human_age < 1) {
        return '不明';
    }

    if ($human_age == 1) {
        return 15;
    } elseif ($human_age == 2) {
        return 24;
    } else {
        return 24 + ($human_age - 2) * 4;
    }
}
?>
<?php if (!empty($posts)): ?>
    <div class="backcolor">
        <?php foreach ($posts as $post): ?>
            <?php
            // ランダムクラスを選択（必要に応じてクラスを追加可能）
            $randomClasses = ['neko1', 'neko2', 'neko3', 'neko4'];
            $randomClass = $randomClasses[array_rand($randomClasses)];
            ?>
            <div class="kakikomi <?= $randomClass ?>">
                <p>
                    <small><?= str2html($post['created_at']) ?></small>
                </p>
                <p>
                    <strong><?= str2html($post['name']) ?></strong> にゃん
                </p>
                <p>
                    ねこ年齢 <strong><?= human_to_cat_age((int)$post['age']) ?></strong> さい
                </p>
                <p class="tk_comment"><?= nl2br(str2html($post['comment'])) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>投稿はまだありません。</p>
<?php endif; ?>