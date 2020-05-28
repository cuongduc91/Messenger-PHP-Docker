create database mychat;
/*
drop table mychat.users ;
drop table mychat.users users_chat;
*/
create table mychat.users(
	user_id SERIAL,
	user_name varchar(100),
	user_pass varchar(100),
	user_email varchar(100),
	user_profile varchar(255),
	user_country text,
	user_gender text,
	forgotten_answer varchar(100),
	log_in varchar(7)
);

create table mychat.users_chat(
	msg_id SERIAL,
	sender_username varchar(100),
	receiver_username varchar(100),
	msg_content varchar(255),
	msg_status text,
	msg_date timestamp default current_timestamp
);