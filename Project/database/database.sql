CREATE TABLE restaurant (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name VARCHAR,
	location VARCHAR,
  type VARCHAR
	);

CREATE TABLE review (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	id_restaurant INTEGER REFERENCES restaurant,
	id_user INTEGER REFERENCES user,
	text VARCHAR,
	grade INTEGER
);

CREATE TABLE user (
  username VARCHAR PRIMARY KEY UNIQUE,
  password VARCHAR,
  name VARCHAR,
  email VARCHAR,
  gender VARCHAR
);

CREATE TABLE restaurantImages (
	id INTEGER PRIMARY KEY AUTOINCREMENT ,
	id_restaurant INTEGER,
	path VARCHAR
);

INSERT INTO restaurantImages VALUES (NULL, 1, 'default-restaurant-icon.jpg');

INSERT INTO restaurant VALUES (NULL,'Melhor Restaurante','Rua dos Clerigos,Porto','Gourmet');
INSERT INTO restaurant VALUES (NULL,'Melhor francesinha do Mundo','Rua de todos os santo,Porto','Francesinha');
INSERT INTO restaurant VALUES (NULL,'Churasqueira da Pinta','Rua forum da maia,Maia,Porto','Churasqueira');

INSERT INTO review VALUES (NULL,1,1,'Melhor restaurante do porto e não sei se do mundo, melhores rojoes de sempre',9);
INSERT INTO review VALUES (NULL,2,1,'Quem quiser provar a melhor francesinha do Porto basta ir a este restaurante, que tambem tem uma otima localizacao',8);

/*INSERT INTO user VALUES ('username1','vivaaoporto','Nuno Ramos','nuno@gmail.com','Male');
INSERT INTO user VALUES ('username2','portoooo','Ines peixe','peixe@gmail.com','Female');*/
