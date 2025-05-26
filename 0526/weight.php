<?php
require_once "function.php";

$height = (float)$_POST["height"];
$weight = (float)$_POST["weight"];

if (!((0 < $height) && ($height < 3))) {
    echo "身長を正しく入力してください。";
    exit;
}
if (($weight < 30) || (200 < $weight)) {
    echo "体重を正しく入力してください。";
    exit;
}

$goal_weight = $height * $height * 22;
$difference = abs($goal_weight - $weight);

echo "体重" . str2html($weight) . "kg<br>";
echo "身長" . str2html($goal_weight) . "kg<br>";
echo "後" . str2html($difference) . "kgで適正体重です。<br>";
