<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>Quatro</title>
</head>

<body>
    <form class="quatro-form" name="form1" method="post" action="sign-up-and-submit-and-delete-accunt.php">
        ジャンル
        <select name="input_genre">
        <?php
$options = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
        for ($i=0; $i < count($options); $i++) {
            echo "<option value=".$options[$i].">".$options[$i]."</option>\n";
        }
?>
        </select>
        スレッド名
        <select name="input_thread">
        <?php
$options = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
        for ($i=0; $i < count($options); $i++) {
            echo "<option value=".$options[$i].">".$options[$i]."</option>\n";
        }
?>
        </select>
        id
        <select name="input_id">
<?php
$options = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
        for ($i=0; $i < count($options); $i++) {
            echo "<option value=".$options[$i].">".$options[$i]."</option>\n";
        }
?>
        </select>
        ニックネーム
        <select name="input_nickname">
        <?php
$options = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
        for ($i=0; $i < count($options); $i++) {
            echo "<option value=".$options[$i].">".$options[$i]."</option>\n";
        }
?>
        </select>
        パスワード<input type="password" name="input_password" />
        メッセージ<input type="text" name="input_message" />
        <input type="submit" value="アカウントを登録しスレッドを立ててメッセージを投稿しアカウントを削除する">
    </form>
    <form class="quatro-form" name="form2" method="post" action="delete.php">
        スレッドID<input type="text" name="input_thread_id" />
        <input type="submit" value="を削除する">
    </form>
    <form class="quatro-form" name="form3" method="post" action="find-and-sort.php">
        キーワード<input type="text" name="input_keyword" />を検索して、マッチしたスレッドIDの0文字目から<input type="number" name="input_delete" />文字を削除して
        <input type="submit" value="ソートする">
    </form>

    <?php
    $dsn = 'pgsql:dbname=group4 host=dougom29.kagoshima-ct.ac.jp';
    $user = 'group4';
    $password = '5ig4pass';
    try {
        $dbh = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        print('<code>Error: ' . $e->getMessage() . '</code>');
        die();
    }
    $sql = 'SELECT * FROM ultra_thread ORDER BY id';
    $result = '';
    try {
        foreach ($dbh->query($sql) as $row) {
            $result .= $row[0] . '→' . "\n";
        }
    } catch (PDOException $e) {
        print('[ERROR] ' . $e->getMessage() . "\n");
        die();
    }

    echo $result;
?>
</body>

</html>
