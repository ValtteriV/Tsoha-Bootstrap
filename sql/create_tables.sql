-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Lisuke(
    lisukenro SERIAL PRIMARY KEY,
    nimi varchar(50) NOT NULL
);

CREATE TABLE Pizza(
    pizzanro SERIAL PRIMARY KEY,
    nimi varchar(50) NOT NULL,
    hinta FLOAT NOT NULL
);

CREATE TABLE PizzaJaLisukkeet(
    pizzanro INTEGER REFERENCES Pizza(pizzanro),
    lisukenro INTEGER REFERENCES Lisuke(lisukenro)
);

CREATE TABLE Kayttaja(
    kayttajaId SERIAL PRIMARY KEY,
    nimi varchar(50) NOT NULL,
    osoite varchar(50) NOT NULL,
    puhelinNro varchar(50) NOT NULL,
    kayttajaTunnus varchar(50) NOT NULL,
    salasana varchar(50) NOT NULL
);





