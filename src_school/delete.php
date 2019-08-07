<?php
$id = $_POST['input_thread_id'];

$dsn = 'pgsql:dbname=group4 host=dougom29.kagoshima-ct.ac.jp';
#$dsn = 'pgsql:dbname=group4 host=localhost port=5432';
$user = 'group4';
$password = '5ig4pass';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    print('<code>Error: ' . $e->getMessage() . '</code>');
    die();
}

$sql = "DELETE FROM ultra_thread WHERE id = '{$id}'";

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
