<?php
$conn = pg_connect("host=localhost port=5432 dbname=group4 user=postgres password=postgres");
if (!$conn) {
    die('接続できませんでした');
}
echo '接続に成功しました';
echo "<br />\n";

pg_set_client_encoding($conn, "UNICODE");

$sql = <<< SQL
SELECT * FROM tag
SQL;

$result = pg_query($conn, $sql);

if (!$result) {
    die('クエリーが失敗しました。'.pg_last_error());
}

while ($row = pg_fetch_row($result)) {
    echo "tag_name: $row[0], is_warning: $row[1]";
    echo "<br />\n";
}

echo hash('sha256', 'a');

?>
