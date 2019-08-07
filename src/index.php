<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>Quatro</title>
</head>

<body>
    <form class="quatro-form" name="form1" method="post" action="sign-up-and-submit-and-delete-accunt.php">
        id
        <select name="input_id">
<?php
$options = array('北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','新潟県','富山県','石川県','福井県','山梨県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県');
        for ($i=0; $i < count($options); $i++) {
            echo "<option value=".$options[$i].">".$options[$i]."</option>";
        }
?>
            <option value="a">a</option>
            <option value="b">b</option>
            <option value="c">c</option>
            <option value="d">d</option>
            <option value="e">e</option>
            <option value="f">f</option>
            <option value="g">g</option>
            <option value="h">h</option>
            <option value="i">i</option>
            <option value="j">j</option>
            <option value="k">k</option>
            <option value="l">l</option>
            <option value="m">m</option>
            <option value="n">n</option>
            <option value="o">o</option>
            <option value="p">p</option>
            <option value="q">q</option>
            <option value="r">r</option>
            <option value="s">s</option>
            <option value="t">t</option>
            <option value="u">u</option>
            <option value="v">v</option>
            <option value="w">w</option>
            <option value="y">y</option>
            <option value="z">z</option>
        </select>
        ジャンル
        <select name="input_genre">
            <option value="a">a</option>
            <option value="b" selected>b</option>
            <option value="c">c</option>
            <option value="d">d</option>
            <option value="e">e</option>
            <option value="f">f</option>
            <option value="g">g</option>
            <option value="h">h</option>
            <option value="i">i</option>
            <option value="j">j</option>
            <option value="k">k</option>
            <option value="l">l</option>
            <option value="m">m</option>
            <option value="n">n</option>
            <option value="o">o</option>
            <option value="p">p</option>
            <option value="q">q</option>
            <option value="r">r</option>
            <option value="s">s</option>
            <option value="t">t</option>
            <option value="u">u</option>
            <option value="v">v</option>
            <option value="w">w</option>
            <option value="y">y</option>
            <option value="z">z</option>
        </select>
        スレッド名
        <select name="input_thread">
            <option value="a">a</option>
            <option value="b">b</option>
            <option value="c">c</option>
            <option value="d">d</option>
            <option value="e">e</option>
            <option value="f">f</option>
            <option value="g">g</option>
            <option value="h">h</option>
            <option value="i">i</option>
            <option value="j">j</option>
            <option value="k">k</option>
            <option value="l">l</option>
            <option value="m">m</option>
            <option value="n">n</option>
            <option value="o">o</option>
            <option value="p">p</option>
            <option value="q">q</option>
            <option value="r">r</option>
            <option value="s">s</option>
            <option value="t">t</option>
            <option value="u">u</option>
            <option value="v">v</option>
            <option value="w">w</option>
            <option value="y">y</option>
            <option value="z">z</option>
        </select>
        ニックネーム
        <select name="input_nickname">
            <option value="a">a</option>
            <option value="b">b</option>
            <option value="c">c</option>
            <option value="d">d</option>
            <option value="e">e</option>
            <option value="f">f</option>
            <option value="g">g</option>
            <option value="h">h</option>
            <option value="i">i</option>
            <option value="j">j</option>
            <option value="k">k</option>
            <option value="l">l</option>
            <option value="m">m</option>
            <option value="n">n</option>
            <option value="o">o</option>
            <option value="p">p</option>
            <option value="q">q</option>
            <option value="r">r</option>
            <option value="s">s</option>
            <option value="t">t</option>
            <option value="u">u</option>
            <option value="v">v</option>
            <option value="w">w</option>
            <option value="y">y</option>
            <option value="z">z</option>
        </select>
        パスワード<input type="password" name="input_password" />
        メッセージ<input type="text" name="input_message" />
        <input type="submit" value="アカウントを登録しスレッドを立ててメッセージを投稿しアカウントを削除する">
    </form>
    <form class="quatro-form" name="form2" method="post" action="delete.php">
        スレッドID<input type="text" name="input_thread_id" />
        <input type="submit" value="を削除する">
    </form>
    <form class="quatro-form" name="form3" method="post" action="index.php">
        キーワード<input type="text" name="input_keyword" />を検索して、マッチしたスレッドIDの0文字目から<input type="number" name="input_sort" />文字を削除して
        <input type="submit" value="ソートする">
    </form>

    <?php
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
    select * from ultra_thread ORDER BY id;
    SQL;
    $result = '';
    try {
        foreach ($dbh->query($sql) as $row) {
            $result .= $row[0] . '～';
        }
    } catch (PDOException $e) {
        print('[ERROR] ' . $e->getMessage() . "\n");
        die();
    }

    echo <<< HTML
        {$result}
    HTML;
    ?>
</body>

</html>