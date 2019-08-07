<?php
$keyword = $_POST['input_keyword'];
$delete_length = $_POST['input_delete'];

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

$sql = "SELECT * FROM ultra_thread ORDER BY id";

echo $keyword . 'を検索して' . $delete_length . '文字先頭から削除<br />';

try {
    $array = array();
    foreach ($dbh->query($sql) as $row) {
        if (preg_match('/' . $keyword . '/', $row[0])) {
            $rowtemp = substr($row[0], $delete_length);
            array_push($array, $rowtemp);
        }
    }
    sort($array);
    foreach ($array as $item) {
        echo $item . '→' . "\n";
    }
} catch (PDOException $e) {
    print('[ERROR] ' . $e->getMessage() . "\n");
    die();
}

#header('Location: http://dougom29.kagoshima-ct.ac.jp/~group4/index.php');
exit;
