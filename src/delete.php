<?php
$id = $_POST['input_thread_id'];

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
DELETE FROM ultra_thread WHERE id = '{$id}'
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
