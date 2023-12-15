
CREATE TABLE IF NOT EXISTS Attori( 
	IDAttori INT PRIMARY KEY,
    	nome VARCHAR(30),
	cognome VARCHAR(30),
	nascita DATE
);

CREATE TABLE IF NOT EXISTS Film( 
    -> IDFilm INT PRIMARY KEY,
    -> Titolo VARCHAR(255),
    -> Genere VARCHAR(50),
    -> AnnoProduzione INT
    -> );

CREATE TABLE IF NOT EXISTS Contratto(
	IDContratto INT PRIMARY KEY,
	