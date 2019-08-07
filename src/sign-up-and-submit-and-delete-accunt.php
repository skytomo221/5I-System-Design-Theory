<?php
$id = date("YmdHis") . $_POST['input_id'] . $_POST['input_genre'] . $_POST['input_thread'] . $_POST['input_nickname'] . $_POST['input_message'];

$dsn = 'pgsql:dbname=group4 host=localhost port=5432';
$user = 'group4';
$password = '5ig4pass';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    print('<code>Error: ' . $e->getMessage() . '</code>');
    die();
}

$sql = <<< SQL
INSERT INTO ultra_thread (
    id
) VALUES (
    '{$id}'
);
SQL;

echo $sql;

try {
    $res = $dbh->query($sql);
    var_dump($res);
} catch (PDOException $e) {
    print('[ERROR] ' . $e->getMessage() . "\n");
    die();
}

header('Location: http://localhost/index.php');
exit;
