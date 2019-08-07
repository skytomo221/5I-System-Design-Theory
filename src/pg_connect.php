<?php
$conn = pg_connect("host=localhost port=5432 dbname=group4 user=group4 password=5ig4pass");

if (!$conn) {
    die('接続失敗です。'.pg_last_error($conn));
}

// PostgreSQLに対する処理

pg_close($conn);
?>