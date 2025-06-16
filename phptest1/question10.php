<?php
// POSTメソッドで送信されたデータを取得
// isset() を使って、値が送信されているかを確認するとより安全です。
$name = isset($_POST['name']) ? $_POST['name'] : '（名前なし）';
$comment = isset($_POST['comment']) ? $_POST['comment'] : '（コメントなし）';

// XSS対策：htmlspecialchars() を使ってHTMLタグを無害化する
$escaped_name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$escaped_comment = htmlspecialchars($comment, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>受信結果</title>
</head>

<body>
    <h1>受信したコメント</h1>
    <p>
        <?php echo $escaped_name; ?>さんのコメント：<br>
        <?php echo nl2br($escaped_comment); // nl2br()は改行文字を<br>タグに変換する関数
        ?>
    </p>
    <p><a href="comment.html">フォームに戻る</a></p>
</body>

</html>