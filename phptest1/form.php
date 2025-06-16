<?php
// ---------------------------------
// 共通の準備
// ---------------------------------
require_once __DIR__ . '/functions.php'; // 自作関数の読み込み

// データベース接続情報
$user = "phpuser";
$password = "Takeyu0124";  // ご自身で設定したパスワード
$db_name = "sample_db";    // データベース名
$host = "localhost";
$dsn = "mysql:host={$host};dbname={$db_name};charset=utf8";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
];

// エラーメッセージを格納する配列
$errors = [];

// ---------------------------------
// POSTリクエスト処理 (フォームが送信されたときの処理)
// ---------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームから送信されたデータを取得
    $affiliation = $_POST['affiliation'] ?? '';
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';

    // バリデーション
    if (empty($affiliation)) {
        $errors[] = '所属グループを入力してください。';
    }
    if (empty($name)) {
        $errors[] = '名前を入力してください。';
    }
    if (empty($age)) {
        $errors[] = '年齢を入力してください。';
    } elseif (!is_numeric($age)) {
        $errors[] = '年齢は数値で入力してください。';
    }

    // エラーがなければデータベースに登録
    if (empty($errors)) {
        try {
            $dbh = new PDO($dsn, $user, $password, $opt);
            $sql = "INSERT INTO members (affiliation, name, age) VALUES (:affiliation, :name, :age)";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':affiliation', $affiliation, PDO::PARAM_STR);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':age', (int)$age, PDO::PARAM_INT);
            $stmt->execute();

            // PRGパターン: 二重投稿を防ぐため、自分自身にリダイレクト
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        } catch (PDOException $e) {
            $errors[] = 'データベースエラー: ' . $e->getMessage();
        }
    }
}

// ---------------------------------
// GETリクエスト処理 (ページを最初に表示するときの処理)
// ---------------------------------
try {
    $dbh = new PDO($dsn, $user, $password, $opt);
    $sql = "SELECT * FROM members ORDER BY id DESC"; // 新しい順に並べる
    $statement = $dbh->query($sql);
} catch (PDOException $e) {
    // 接続エラーは致命的なので、メッセージを表示して終了
    echo "データベース接続に失敗しました: " . str2html($e->getMessage());
    exit;
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録フォーム</title>
    <style>
        body {
            margin: 20px;
            font-family: sans-serif;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
            width: 100%;
            max-width: 500px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <h1>登録フォーム</h1>

    <?php // エラーがあれば表示する
    ?>
    <?php if (!empty($errors)): ?>
        <div class="error">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo str2html($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="" method="post">
        <label for="affiliation">所属グループ：
            <input type="text" id="affiliation" name="affiliation" value="<?php echo isset($affiliation) ? str2html($affiliation) : ''; ?>">
        </label>
        <label for="name">名前：
            <input type="text" id="name" name="name" value="<?php echo isset($name) ? str2html($name) : ''; ?>">
        </label>
        <label for="age">年齢：
            <input type="number" id="age" name="age" value="<?php echo isset($age) ? str2html($age) : ''; ?>">
        </label>
        <button type="submit">登録</button>
    </form>

    <h2>登録内容</h2>
    <table>
        <tr>
            <th>所属グループ</th>
            <th>名前</th>
            <th>年齢</th>
        </tr>
        <?php // 取得したデータをループして表示
        ?>
        <?php while ($row = $statement->fetch()): ?>
            <tr>
                <td><?php echo str2html($row['affiliation']); ?></td>
                <td><?php echo str2html($row['name']); ?></td>
                <td><?php echo str2html($row['age']); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>