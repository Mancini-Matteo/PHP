-- Creazione del database Videoteca
CREATE DATABASE IF NOT EXISTS Videoteca;
USE Videoteca;

-- Creazione della tabella Film
CREATE TABLE IF NOT EXISTS Film (
    id INT PRIMARY KEY,
    titolo VARCHAR(100),
    genere VARCHAR(30),
    durata INT
);

-- Inserimento di dati nella tabella Film
INSERT INTO Film VALUES
(1, 'Il Misterioso', 'Azione', 90),
(2, 'La Commedia', 'Commedia', 110),
(3, 'Il Drammatico', 'Drammatico', 130),
(4, 'L''Orrore', 'Horror', 120),
(5, 'Il Fantastico', 'Drammatico', 150);