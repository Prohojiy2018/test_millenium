запуск:

docker-compose up --build

docker exec -it tools_php-mysql sh

mysql -uroot -p 
  (пароль s123123)

CREATE DATABASE `public`;

CREATE USER 'user1'@'%' IDENTIFIED BY 's123';

GRANT ALL PRIVILEGES ON `public` . * TO 'user1'@'%';

pgmyadmin - http://localhost:8000/ (база данных mysql, имя пользователя user1, пароль s123)

запустить запросы из дампа

проверить первое задание, пункт 1:

http://localhost/orders?user_id=2

проверить второе задание, пункт 2 - через Postman http://localhost/products метод POST
в body что то типа [{"title": "тест", "price": "123"},{"title": "тест1", "price": "1243"}]

