GRANT ALL PRIVILEGES ON mydb.* TO 'root'@'%';
GRANT ALL PRIVILEGES ON mydb.* TO 'root'@'localhost';
CREATE OR REPLACE USER 'root'@'localhost' IDENTIFIED BY 'secret';
FLUSH PRIVILEGES;