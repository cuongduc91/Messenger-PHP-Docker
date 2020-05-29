select * from mychat.users u ;
delete from mychat.users where user_name="Manuel";

select * from mychat.users_chats;
delete from mychat.users_chats;

INSERT INTO mychat.users_chats
(sender_username, receiver_username, msg_content, msg_status, msg_date)
VALUES('Cuong', 'Manuel', 'Hallo', 'read', CURRENT_TIMESTAMP);

INSERT INTO mychat.users_chats
(sender_username, receiver_username, msg_content, msg_status, msg_date)
VALUES('Manuel', 'Cuong', 'Wie gehts?', 'unread', CURRENT_TIMESTAMP);