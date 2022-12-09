drop table if exists data;

create table data(id integer PRIMARY KEY autoincrement, value integer);

insert into data(id, value) values(null, "Value example");
insert into data(id, value) values(null, "Value example");

drop table if exists users;

create table users(
    id integer PRIMARY KEY autoincrement,
    username text,
    password text
);

insert into users (id, username, password)
       values
            (null, "developer", "password"),
            (null, "admin", "password");
