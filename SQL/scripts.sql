CREATE DATABASE IF NOT EXISTS note;

USE note;

CREATE TABLE utenti (
  id INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE username_unique (username),
  UNIQUE email_unique (email)
);

CREATE TABLE note (
  id INT NOT NULL AUTO_INCREMENT,
  titolo VARCHAR(100) NOT NULL,
  contenuto TEXT NOT NULL,
  data_creazione DATE NOT NULL,
  data_modifica DATE NOT NULL,
  id_utente INT NOT NULL,
  id_raccoglitore INT NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_utenti_note FOREIGN KEY (id_utente) REFERENCES utenti(id),
  CONSTRAINT fk_raccoglitori_note FOREIGN KEY (id_raccoglitore) REFERENCES raccoglitori(id)
);

CREATE TABLE raccoglitori (
  id INT NOT NULL AUTO_INCREMENT,
  titolo VARCHAR(100) NOT NULL,
  id_utente INT NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_utenti_raccoglitori FOREIGN KEY (id_utente) REFERENCES utenti(id)
);