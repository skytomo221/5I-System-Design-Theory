<?php
function random($length = 8)
{
    return substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, $length);
}

var_dump($_POST);

$dsn = 'pgsql:dbname=group4 host=dougom29.kagoshima-ct.ac.jp';
$user = 'group4';
$password = '5ig4pass';
try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    print('<code>Error: ' . $e->getMessage() . '</code>');
    die();
}

$sql = <<< SQL
SELECT count(*) FROM user_accunt
SQL;
try {
    $result = $dbh->query($sql);
    if ($result !== false) {
        foreach ($result as $row) {
            // do stuff
        }
    } else {
        echo 'The SQL query failed with error ' . $dbh->errorCode;
    }
    foreach ($dbh->query($sql) as $row) {
        $internal_id = $row[0];
        echo $internal_id . '<br />';
    }
} catch (PDOException $e) {
    print('[ERROR] ' . $e->getMessage() . "\n");
    die();
}

$salt = random(15);
$passsalt = hash('sha256', $_POST['input_password'] . $salt);

# IDが重複していないかチェック
$sql = <<< SQL
SELECT EXISTS (SELECT * FROM user_accunt WHERE external_id = '{$_POST['input_id']}');
SQL;
try {
    foreach ((array) $dbh->query($sql) as $row) {
        if ($row[0]) {
            $uri = $_SERVER['HTTP_REFERER'];
            header("Location: " . $uri);
            echo $_POST['input_id'] . 'というIDは既に使われています。';
            echo '<br />';
            die();
        }
    }
} catch (PDOException $e) {
    print('[ERROR] ' . $e->getMessage() . "\n");
    die();
}

echo $internal_id;
echo '<br />';
echo $_POST['input_id'];
echo '<br />';
echo $_POST['input_nickname'];
echo '<br />';
echo $_POST['input_email'];
echo '<br />';
echo $passsalt;
echo '<br />';
echo $salt;
echo '<br />';
echo $_POST['input_url'];
echo '<br />';

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

print_r($sql)
try{
    $dbh->query($sql);
} catch (PDOException $e) {
    print('[ERROR] ' . $e->getMessage() . "\n");
    die();
}
