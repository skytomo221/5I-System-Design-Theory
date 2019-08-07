<?php
function random($length = 8)
{
    return substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, $length);
}

$conn = pg_connect("host=localhost port=5432 dbname=group4 user=group4 password=5ig4pass");
if (!$conn) {
    die('接続できませんでした');
}
echo '接続に成功しました';
echo "<br />\n";

pg_set_client_encoding($conn, "UNICODE");

$sql = <<< SQL
SELECT count(*) FROM user_accunt
SQL;
$result = pg_query($conn, $sql);
$row = pg_fetch_row($result);
$internal_id = $row[0];

$salt = random(15);
$passsalt = hash('sha256', $_POST['input_password'] . $salt);

# IDが重複していないかチェック
$sql = <<< SQL
SELECT EXISTS (SELECT * FROM user_accunt WHERE external_id = '{$_POST['input_id']}');
SQL;
$result = pg_query($conn, $sql);
$row = pg_fetch_row($result);
if ($row[0]) {
    $uri = $_SERVER['HTTP_REFERER'];
    header("Location: ".$uri);
    echo $_POST['input_id'] . 'というIDは既に使われています。';
    echo '<br />';
    exit;
}

echo $internal_id; echo '<br />';
echo $_POST['input_id']; echo '<br />';
echo $_POST['input_nickname']; echo '<br />';
echo $_POST['input_email']; echo '<br />';
echo $passsalt; echo '<br />';
echo $salt; echo '<br />';
echo $_POST['input_url']; echo '<br />';

$sql = <<< SQL
INSERT INTO user_accunt (
	internal_id,
    external_id,
    nickname,
    email,
    passsalt,
    salt,
    create_date,
    icon
) VALUES (
    {$internal_id},
    '{$_POST['input_id']}',
    '{$_POST['input_nickname']}',
    '{$_POST['input_email']}',
    '{$passsalt}',
    '{$salt}',
    now(),
    '{$_POST['input_url']}'
);
SQL;
$result = pg_query($conn, $sql);
if (!$result) {
    die('クエリーが失敗しました。'.pg_last_error());
}

?>
