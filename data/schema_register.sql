/* SQLLite braucht AUTOINCREMENT*/
CREATE TABLE register (id INTEGER PRIMARY KEY AUTO_INCREMENT, 
firstname varchar(100) NOT NULL, 
lastname varchar(100) NOT NULL,
email varchar(100) NOT NULL,
password varchar(100) NOT NULL);
