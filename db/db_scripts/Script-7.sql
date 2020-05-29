select * from mychat.users u ;
delete from mychat.users where user_name="Manuel";

update mychat.users  set forgotten_answer = "CD" where user_name = "Cuong";

select * from mychat.users_chats;
delete from mychat.users_chats;
