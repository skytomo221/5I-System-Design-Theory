<?php
$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=postgres");
if (!$conn) {
    die('接続できませんでした');
}
echo '接続に成功しました';
?>