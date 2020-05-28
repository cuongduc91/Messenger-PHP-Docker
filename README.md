# Messenger-PHP-Docker

# Docker

- Download and Install Docker at https://www.docker.com
- Run the .yml file to build the containers as environment
  `docker-compose up`

# db

- As local MySQL database running on port 3310

# DBeaver

- Download and install DBeaver as GUI configuration to the MySQL database
- https://dbeaver.io
- Configuration as 'root' on port 3310

# Environment file

- Create the development.env file in the main folder.
- Env. Parameters: MYSQL_USER, MYSQL_PASSWORD, MYSQL_ROOT_PASSWORD...

# www

- As the php dockerfile folder running on localhost:8000

# Important!

## Granting privileges to another user

## In terminal:

```
docker exec -it <container name or id>   bash
mysql -u root -p
//loging with root password
GRANT ALL PRIVILEGES ON php_data.* TO '<user name>'@'%' WITH GRANT OPTION;
```
