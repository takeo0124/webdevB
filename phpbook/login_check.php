<?php

if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION['login'])) {
    echo "このページにアクセスするには<a href='login.php'>ログイン</a>が必要です。<br>";
    exit;
}
echo "<!--ログイン中-->";
