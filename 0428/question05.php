<?php
# 1. 配列 ['赤', '青', '黄'] を作成し、foreach で各要素を1行ずつ表示してください。
$a = ['赤', '青', '黄'];

foreach ($a as $value) {
    echo $value . '<br>';
}
# 2. ['りんご' => 150, 'バナナ' => 120, 'みかん' => 100] の配列から「フルーツ名：価格円」と表示してください。
$b = ['りんご' => 150, 'バナナ' => 120, 'みかん' => 100];

foreach ($b as $key => $value) {
    echo $key . '：' . $value . '円' . '<br>';
}
# 3. [100, 200, 300] という配列の合計値を求めて表示してください（foreach を使って）。
$c = [100, 200, 300];
$sum = 0;

foreach ($c as $value) {
    $sum += $value;
}

echo "合計値 : " . $sum . '<br>';
# 4. ['PHP', 'JavaScript', 'Python'] という配列に foreach を使って、インデックス番号と一緒に表示してください（例: 0: PHP）。
$d = ['PHP', 'JavaScript', 'Python'];

foreach ($d as $value => $index) {
    echo $index . ': ' . $value . '<br>';
}
# 5. ['A', 'B', 'C'] の各要素に「さん」を付けて表示してください（例: Aさん）。
$e = ['A', 'B', 'C'];
foreach ($e as $value) {
    echo $value . 'さん' . '<br>';
}

# 6. [10, 20, 30] の各値を2倍にして出力してください。
$f = [10, 20, 30];

foreach ($f as $value) {
    echo $value * 2 . '<br>';
}

# 配列でサンリオのキャラクターを20個で作成して下さい
$sanrio_characters = [
    'ハローキティ',
    'マイメロディ',
    'シナモロール',
    'ポムポムプリン',
    'クロミ',
    'ポチャッコ',
    'リトルツインスターズ', // キキ＆ララ
    'けろけろけろっぴ',
    'タキシードサム',
    'バッドばつ丸',
    'ぐでたま',
    'ハンギョドン',
    'ウィッシュミーメル',
    'こぎみゅん',
    'KIRIMIちゃん.',
    'マイスウィートピアノ',
    'コロコロクリリン',
    'おさるのもんきち',
    'あひるのペックル',
    'ディアダニエル' // 20番目
];

foreach ($sanrio_characters as $character) {
    echo $character . '<br>';
}
