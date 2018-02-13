/*Drop table book; für sqllite AUTOINCREMENT*/
CREATE TABLE book (id INTEGER PRIMARY KEY AUTO_INCREMENT, autor varchar(100) NOT NULL, title varchar(100) NOT NULL, land varchar(100) NOT NULL);
INSERT INTO book (autor, title, land) VALUES ('Stephen King', 'It', 'USA');
INSERT INTO book (autor, title, land) VALUES ('Kai Meyer', 'Die Seiten der Welt', 'Germany');
INSERT INTO book (autor, title, land) VALUES ('Kai Meyer', 'Nachtland', 'Germany');
INSERT INTO book (autor, title, land) VALUES ('Kai Meyer', 'Blutbuch', 'Germany');