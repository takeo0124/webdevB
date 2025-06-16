<?php
#⑦ 次の2次元配列$usersには、複数人の名前・年齢・スコアが格納されています。
#各ユーザーについて「名前: 年齢歳, スコア: ○○, 判定: △△」の形式で1人ずつ表示するPHPコードを書きなさい。
#判定はスコアが80以上なら「優」、60以上80未満なら「良」、それ以外は「可」とすること。
// 2次元配列を定義
$users = [
    ['name' => 'Ken', 'age' => 20, 'score' => 85],
    ['name' => 'Yui', 'age' => 22, 'score' => 78],
    ['name' => 'Taro', 'age' => 19, 'score' => 55]
];

// 各ユーザーについてループ
foreach ($users as $user) {
    // 各情報を変数に格納
    $name = $user['name'];
    $age = $user['age'];
    $score = $user['score'];

    // スコアに応じて判定を決定
    if ($score >= 80) {
        $judgment = "優";
    } elseif ($score >= 60) {
        $judgment = "良";
    } else {
        $judgment = "可";
    }

    // ★★★ 変更点 ★★★
    // ご指摘の通り、問題文の形式に厳密に合わせて出力
    // 「名前:」の直後に名前と年齢を連結し、「年齢:」のラベルをなくした
    echo "名前: {$name}{$age}歳, スコア: $score, 判定: $judgment<br>";
}
