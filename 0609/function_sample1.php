<?php
function test()
{
    // ローカル変数{}内の変数
    $a = 10;
    return $a; // 関数の戻り値
}
// ローカル変数{}外の変数
$a = test(); // 関数の実行、$a変数に戻り値を代入
echo $a;// 10と表示される→ローカル変数の値が戻り値としてグローバル変数に代入される
