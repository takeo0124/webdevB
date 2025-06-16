<?php
#③ $total = 1000に税込10%を加えた金額（整数）を表示するコードを書いてください。
$total = 1000;
$tax = 1.1; // 税率10%を加えるための係数
$total_with_tax = (int)($total * $tax); // 税込み金額を計算し整数に変換
echo $total_with_tax; // 結果を表示