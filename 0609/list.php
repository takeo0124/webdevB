<?php
# connect1.php
require_once './functions.php';

try {
    $dbh = db_open();
    //変数にSQL文を代入
    $sql = 'SELECT title, author FROM books';
    // SQL文を実行→結果を変数に代入配列で取得
    $statement = $dbh->query($sql);

    while ($row = $statement->fetch()) {
        //データを1行ずつ取得
        echo "書籍名" . str2html($row[0]) . "<br>";
        echo "著者名" . str2html($row[1]) . "<br>";
    }
    // var_dump($dbh);
} catch (PDOException $e) {
    //例外をcatchしてエラーメッセージを表示
    // XSS対策のためにエスケープ
    echo '接続失敗:' . $e->getMessage() . "<br>";
    exit;
}
