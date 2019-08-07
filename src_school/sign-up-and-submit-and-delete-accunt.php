<?php
$id = date("YmdHis") . $_POST['input_genre'] . $_POST['input_thread'] . $_POST['input_id'] . $_POST['input_nickname'] . $_POST['input_message'];

#$dsn = 'pgsql:dbname=group4 host=localhost port=5432';
$dsn = 'pgsql:dbname=group4 host=dougom29.kagoshima-ct.ac.jp';
$user = 'group4';
$password = '5ig4pass';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    print('<code>Error: ' . $e->getMessage() . '</code>');
    die();
}

$sql = "INSERT INTO ultra_thread (id) VALUES ('" . $id . "');";

echo $sql . '<br />';

try {
    $res = $dbh->query($sql);
    var_dump($res);
} catch (PDOException $e) {
    print('[ERROR] ' . $e->getMessage() . "\n");
    die();
}

header('Location: http://dougom29.kagoshima-ct.ac.jp/~group4/index.php');
exit;
