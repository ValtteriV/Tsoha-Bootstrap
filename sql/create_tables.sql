-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Lisuke(
    lisukenro SERIAL PRIMARY KEY,
    nimi varchar(50) NOT NULL
);

CREATE TABLE Pizza(
    pizzanro SERIAL PRIMARY KEY,
    nimi varchar(50) NOT NULL,
    hinta INTEGER NOT NULL
);

CREATE TABLE PizzaJaLisukkeet(
    pizzanro INTEGER REFERENCES Pizza(pizzanro),
    lisukenro INTEGER REFERENCES Lisuke(lisukenro)
);

CREATE TABLE TarjousHinnat(
    tarjouksenAlku DATE NOT NULL,
    tarjouksenLoppu DATE NOT NULL,
    tarjousProsentti INTEGER NOT NULL
);

CREATE TABLE Kayttaja(
    kayttajaId SERIAL PRIMARY KEY,
    nimi varchar(50) NOT NULL,
    osoite varchar(50) NOT NULL,
    puhelinNro varchar(50) NOT NULL
    kayttajaTunnus varchar(50) NOT NULL,
    salasana varchar(50) NOT NULL
);

CREATE TABLE Tilaus(
    tilausnro SERIAL PRIMARY KEY,
    tilausAika DATE NOT NULL,
    tilaaja INTEGER REFERENCES Kayttaja(kayttajaId)
    tilauksenTila INTEGER NOT NULL
);

CREATE TABLE TilauksenPizzat(
    tilausnro INTEGER REFERENCES Tilaus(tilausnro),
    pizzanro INTEEGR REFERENCES Pizza(pizzanro)
);



