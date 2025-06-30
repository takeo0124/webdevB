<?php
if (isset($_POST['token'])) {
    session_start();
}
if (empty($_POST['token'])) {
    echo "エラーが発生しました。";
    exit;
}
if (!(hash_equals($_SESSION['token'], $_POST['token']))) {
    echo "エラーが発生しました(2)";
    exit;
}
