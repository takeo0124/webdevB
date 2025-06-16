<?php
$zipcode = '';
$message = '';
$is_valid = false;

// フォームがPOSTメソッドで送信されたかを確認
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 送信された値を取得し、前後の空白を除去する
    $zip1 = isset($_POST['zip1']) ? trim($_POST['zip1']) : '';
    $zip2 = isset($_POST['zip2']) ? trim($_POST['zip2']) : '';

    // 2つの入力をハイフンで連結して、チェック対象の文字列を作成
    $zipcode = $zip1 . '-' . $zip2;

    // 郵便番号の正規表現パターン
    // ^      : 文字列の先頭
    // \d{3}  : 数字が3桁
    // -      : ハイフン
    // \d{4}  : 数字が4桁
    // $      : 文字列の末尾
    $pattern = '/^\d{3}-\d{4}$/';

    // preg_match() で正規表現に一致するかをチェック
    if (preg_match($pattern, $zipcode)) {
        $message = 'は正しい郵便番号の形式です。';
        $is_valid = true;
    } else {
        $message = 'は不正な形式です。日本の郵便番号（3桁-4桁）で入力してください。';
        $is_valid = false;
    }
} else {
    // POST以外のメソッドでアクセスされた場合
    $message = 'フォームから郵便番号を送信してください。';
}

// XSS対策のため、表示する前に必ずhtmlspecialchars()を通す
$escaped_zipcode = htmlspecialchars($zipcode, ENT_QUOTES, 'UTF-8');
$escaped_message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>郵便番号チェック結果</title>
    <style>
        /* 結果を分かりやすくするための簡単なスタイル */
        body {
            font-family: sans-serif;
        }

        .result {
            border: 1px solid #ccc;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
        }

        .valid {
            color: green;
            font-weight: bold;
        }

        .invalid {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>郵便番号チェック結果</h1>

    <div class="result">
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <p>
                入力された値: <strong><?php echo $escaped_zipcode; ?></strong>
            </p>
            <p>
                結果:
                <?php if ($is_valid): ?>
                    <span class="valid"><?php echo $escaped_message; ?></span>
                <?php else: ?>
                    <span class="invalid"><?php echo $escaped_message; ?></span>
                <?php endif; ?>
            </p>
        <?php else: ?>
            <p><?php echo $escaped_message; ?></p>
        <?php endif; ?>
    </div>

    <p><a href="zip_form.html">フォームに戻る</a></p>
</body>

</html>