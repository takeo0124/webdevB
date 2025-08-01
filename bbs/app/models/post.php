<?php
function get_all_posts($pdo)
{
    $stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insert_post($pdo, $name, $age, $comment)
{
    $stmt = $pdo->prepare("INSERT INTO posts (name, age, comment) VALUES (:name, :age, :comment)");
    $stmt->execute([
        ':name' => $name,
        ':age' => $age,
        ':comment' => $comment,
    ]);
}

function delete_post(PDO $pdo, int $id): void
{
    // 投稿を削除
    $stmt = $pdo->prepare("DELETE FROM posts WHERE id = :id");
    $stmt->execute([':id' => $id]);
}
