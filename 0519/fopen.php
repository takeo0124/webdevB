<?php
require_once('function.php');
// 一回だけ読み込む
// requireは、読み込まれないとエラーになる→止まる

// データを読み込むだけ
$fp = fopen('bookdata.csv', 'r');
var_dump($fp);

// ファイルが開けたか確認
if ($fp === false) {
    echo 'ファイルのオープンに失敗しました';
    exit;
}

/* 複数行
のコメントはオプションシフトA */

// $row = fgetcsv($fp);
// while ($row = fgetcsv($fp)) {
//     // 1行分のデータを表示
//     var_dump($row);
// }

// var_dump($fp);

// 書籍名と著者名を表示する
while ($row = fgetcsv($fp)) {
    echo '<ul>';
    echo '<li>' . "書籍名：" . htmlspecialchars($row[0], ENT_QUOTES, 'UTF-8') . '</li>';
    echo '<li>' . "著者名：" . htmlspecialchars($row[4], ENT_QUOTES, 'UTF-8') . '</li>';
    echo '</ul>';
}
