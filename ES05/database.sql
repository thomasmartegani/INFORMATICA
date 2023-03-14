//creazione database es05
CREATE DATABASE es05;

//creazione tabella utente
CREATE TABLE utente
(
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL,
    pasword VARCHAR(20) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1;

//inserimento dati nuova istanza istanza 
INSERT 
INTO utente(id, username, pasword)
VALUES (NULL, 'Thomas', 'ciao');
