
create database shoppinglist;

use shoppinglist;

create table item (
    id int primary key auto_increment,
    description varchar(255) not null,
    amount smallint unsigned not null
);

insert into item(description, amount) values("test item", 1);