<?php
# 以下のPHPコードにおいて、連想配列 $fruits に 'grape' => 150 を追加し、その後 'apple' の値を200に変更するコードを記述しなさい。

$fruits = [
    'apple' => 100,
    'banana' => 50,
    'orange' => 80,
];

$fruits['grape'] = 150;
$fruits['apple'] = 200;

echo $fruits;

# 変数 $score に格納された点数に応じて、以下の条件でメッセージを表示するPHPコードを記述しなさい。

#80点以上：「合格です！」
#60点以上80点未満：「もう少し頑張りましょう。」
#60点未満：「不合格です。」

$score = 75;
if ($score >= 80) {
    echo "合格です！";
} elseif ($score >= 60) {
    echo "もう少し頑張りましょう。";
} else {
    echo "不合格です。";
}
