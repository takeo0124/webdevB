<?php
// functions.php
function str2html(string $string): string
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
function greet()
{
    echo "<p>こんにちは！</p>";
}
