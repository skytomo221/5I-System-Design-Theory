<head>
    <meta charset="utf-8">
    <title>Quatro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css">
</head>

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
select internal_id, external_id, nickname, create_date from user_accunt;
SQL;
$result = '<code class="card-text">' . $sql . '</code><code class="card-text">';
try {
    foreach ($dbh->query($sql) as $row) {
        $result .= $row[0] . ' ' . $row[1] . ' ' . $row[2] . ' ' . $row[3];
    }
} catch (PDOException $e) {
    print('[ERROR] ' . $e->getMessage() . "\n");
    die();
}
$result .= '</code>';

echo <<< HTML
<div class="card" style="width: 20rem;">
  <div class="card-body">
    <h4 class="card-title">User Accunt</h4>
    {$result}
  </div>
</div>
HTML;

?>