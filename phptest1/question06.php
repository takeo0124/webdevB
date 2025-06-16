<?php
#⑥ 連想配列 $person = ['name' => 'Taro', 'age' => 20] のキーと値を「name: Taro」の形式で出力するコードをforeachを使って書いてください。
#$person = ['name' => 'Taro', 'age' => 20];

$person = ['name' => 'Taro', 'age' => 20]; // 連想配列を定義
foreach ($person as $key => $value) { // foreachでキーと値をループ
    echo $key . ": " . $value . "<br>"; // 「キー: 値」の形式で出力
}
