さきほど，PostgeSQLでデータベースの中身を構築しました．
PostgeSQLていうのはデータベースをいじいじするやつです．ポスグレと読みます．
データベースていうのはExcelみたいに表をたくさん管理するやつです．

「データベース」については詳しくはこれをみてください．
https://wa3.i-3-i.info/word133.html

データベースの中身をどう構築したか，以下に書きます．
データベースの名前はgroup4です．

```sql
create table user_accunt(
    internal_id int primary key,
    external_id char(255),
    nickname char(255),
    email char(255),
    passsalt char(255),
    salt char(255),
    create_date date,
    icon char(255)
);
```

これは「アカウント(`user_accunt`)」というテーブル（表）の定義です．文字通り，アカウントを管理するためのテーブルです．「内部ID(`internal_id`)」が主キーです．主キーとは学籍番号みたいなやつで，主キーはユニーク（唯一無二）じゃないといけません．

「主キー」については詳しくはこれをみてください．
https://wa3.i-3-i.info/word1991.html

アカウントテーブルには他に，外部ID(`external_id`)，ニックネーム(`nickname`)，メールアドレス(`email`)，パスワード＋ソルト(`passsalt`)，ソルト(`salt`)，アカウント作成日時(`create_date`)，アイコンのURL(`icon`)があります．

```sql
create table message_table(
    message_type char(15),
    id int primary key,
    contents char(255),
    link char(255),
    create_user int,
    create_date date,
    /* スレッド(thread)のみ */
    genre int,
    reply_count int,
    /* リプライ(reply)のみ */
    mention int,
    thread int,
    reply_number int
);
```

これは「メッセージ(`message_table`)」というテーブル（表）の定義です．
メッセージを管理するためのテーブルです．メッセージはスレッドとリプライを合体させたもので，スレッドとリプライは一緒に管理します．（ここ重要）
主キーはメッセージID(`id`)で，他にメッセージの種類（スレッドなら`"thread"`，リプライなら`"reply"`）を管理するためのメッセージタイプ(`message_type`)，内容(`contents`)，リンク(`link`)，メッセージの作成者(`create_user`)，メッセージの作成日時(`create_date`)があります．また，メッセージタイプが`"thread"`（スレッド）だったときのみ，ジャンル(`genre`)とリプライの数(`reply_count`)という項目が使われます．また，メッセージタイプが`"reply"`（リプライ）だったときのみ，メンション(`mention`)，どこのスレッドに投稿したメッセージか(`thread`)，リプライ番号(`reply_number`)という項目が使われます．

```sql
create table genre(
    id int primary key,
    genre_name char(255)
);
```

これは「ジャンル(`genre`)」というテーブル（表）の定義です．
ジャンルを管理するためのテーブルです．主キーはジャンルID(`id`)で，他の項目にジャンル名(`genre_name`)があります．

```sql
create table tags(
    id int primary key,
    message_id int,
    tag int
);
```

これは「タグリスト(`tags`)」というテーブル（表）の定義です．

```sql
create table tag(
    tag_name char(255) primary key,
    is_warning boolean
);
```

これは「タグ(`tag`)」というテーブル（表）の定義です．
タグを管理するためのテーブルです．主キーはタグ名(`tag_name`)で，他の項目に危険タグかどうかのフラグ(`is_warning`)があります．

```sql
create table replies(
    id int primary key,
    reply int,
    sender int,
    recipient int
);
```

これは「リプライリスト(`replies`)」というテーブル（表）の定義です．
どのメッセージがどのメッセージに返信したかを管理します．
主キーはリプライID(`id`)で，他の項目に返信したメッセージ(`reply`)，返信者(`sender`)，返信されたメッセージ(`recipient`)があります．

```sql
create table evaluations(
    id int primary key,
    message_id int,
    user_accunt int,
    evaluation int
);
```

これは「評価リスト(`evaluations`)」というテーブル（表）の定義です．


```sql
create table evaluation(
    id int primary key,
    evaluation_name char(255)
);
```

これは「評価(`evaluation`)」というテーブル（表）の定義です．
評価を管理するためのテーブルです．主キーは評価ID(`id`)で，評価名(`evaluation_name`)があります．
