<?php
require_once('function.php');

// データを読み込むだけ
$fp = fopen('songs.csv', 'r');
var_dump($fp);

// ファイルが開けたか確認
if ($fp === false) {
    echo 'ファイルのオープンに失敗しました';
    exit;
}

//フォームからの値
$text = $_POST["keyword"];
echo "<p>" . $text . "</p>";

//csvの値
while ($row = fgetcsv($fp)) {
    if ($row[0] == $text) {
        echo "<p>" . $row[0] . "</p>";
        echo "<p>" . $row[1] . "</p>";
    } elseif ($row[1] == $text) {
        echo "<p>" . $row[0] . "</p>";
        echo "<p>" . $row[1] . "</p>";
    }
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
