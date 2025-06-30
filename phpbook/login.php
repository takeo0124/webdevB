<?php
session_start();
require_once __DIR__ . '/inc/functions.php';

if (!empty($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "ユーザ名、パスワードを入力してください。";
    } else {
        try {
            $dbh = db_open();
            $sql = "SELECT password FROM users WHERE username = :username";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result && password_verify($_POST['password'], $result['password'])) {
                session_regenerate_id(true);
                $_SESSION['login'] = true;
                header('Location: index.php');
                exit;
            } else {
                $error = "ログインに失敗しました。";
            }
        } catch (PDOException $e) {
            $error = "エラー！：" . str2html($e->getMessage());
        }
    }
}
?>

<?php include __DIR__ . '/inc/header.php'; ?>

<?php if ($error): ?>
    <p style="color:red;"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
<?php endif; ?>

<form method="post" action="login.php">
    <p>
        <label for="username">ユーザー名：</label>
        <input type="text" id="username" name="username" required>
    </p>
    <p>
        <label for="password">パスワード：</label>
        <input type="password" id="password" name="password" required>
    </p>
    <button type="submit">ログイン</button>
</form>

<?php include __DIR__ . '/inc/footer.php'; ?>