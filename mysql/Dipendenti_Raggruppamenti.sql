-- Creazione del database Dipendenti_Raggruppamenti
CREATE DATABASE IF NOT EXISTS Dipendenti_Raggruppamenti;
USE Dipendenti_Raggruppamenti;

-- Creazione della tabella Dipendenti
CREATE TABLE IF NOT EXISTS Dipendenti (
    id INT PRIMARY KEY,
    nome VARCHAR(50),
    reparto VARCHAR(30),
    stipendio DECIMAL(10, 2)
);

-- Inserimento di dati nella tabella Dipendenti
INSERT INTO Dipendenti VALUES
(1, 'Mario Rossi', 'Vendite', 60000),
(2, 'Anna Bianchi', 'Produzione', 48000),
(3, 'Luca Verdi', 'Vendite', 55000),
(4, 'Giovanna Neri', 'Produzione', 52000);
