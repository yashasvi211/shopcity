--@block
SHOW databases;
--@block C:\xampp\mysql\bin\mysql -u root -p
use shopcity;
--@block
show tables;
--@block
select *
from users;
--@block
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);