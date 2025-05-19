<?php
$text = $_POST("keyword");
while ($row = fgetcsv("songs.csv")) {
    if ($text === $row[0]) {
    }
}
