drop table if exists data;

create table data(id integer PRIMARY KEY autoincrement, value integer);

insert into data(id, value) values(null, 'Value example');
insert into data(id, value) values(null, 'Value example');

drop table if exists users;

create table users(
    id integer PRIMARY KEY autoincrement,
    username text,
    password text
);

insert into users (id, username, password)
       values
            (null, 'developer', '$2y$10$/i57/d5ALQJqoBXB/AJZSejFk93o4Yr4F2t//XvY3tppxf1Vfhu5O'),
            (null, 'admin', '$2y$10$/i57/d5ALQJqoBXB/AJZSejFk93o4Yr4F2t//XvY3tppxf1Vfhu5O');

            -- password is 'password' for testing.
