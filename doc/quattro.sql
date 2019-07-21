create datebase quattro;

create table user_accunt(
    internal_id int primary key,
    external_id char(15),
    nickname char(15),
    email char(255),
    passsalt char(255),
    salt char(15),
    create_date date,
    icon char(255)
);

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

create table genre(
    id int primary key,
    genre_name char(255)
);

create table tags(
    id int primary key,
    message_id int,
    tag int
);

create table tag(
    tag_name char(255) primary key,
    is_warning boolean
);

create table replies(
    id int primary key,
    reply int,
    sender int,
    recipient int
);

create table evaluations(
    id int primary key,
    message_id int,
    user_accunt int,
    evaluation int
);

create table evaluation(
    id int primary key,
    evaluation_name char(255) 
);
