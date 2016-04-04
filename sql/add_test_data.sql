-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Lisuke (nimi) VALUES ('Kinkku');
INSERT INTO Lisuke (nimi) VALUES ('Ananas');
INSERT INTO Lisuke (nimi) VALUES ('Tomaatti');
INSERT INTO Lisuke (nimi) VALUES ('Feta');
INSERT INTO Lisuke (nimi) VALUES ('Oliivi');
INSERT INTO Lisuke (nimi) VALUES ('Sipuli');
INSERT INTO Lisuke (nimi) VALUES ('Simpukka');
INSERT INTO Lisuke (nimi) VALUES ('Tonnikala');
INSERT INTO Lisuke (nimi) VALUES ('Aurajuusto');
INSERT INTO Lisuke (nimi) VALUES ('Juusto');
INSERT INTO Lisuke (nimi) VALUES ('Kana');
INSERT INTO Lisuke (nimi) VALUES ('Salami');
INSERT INTO Lisuke (nimi) VALUES ('Jauheliha');
INSERT INTO Lisuke (nimi) VALUES ('Katkarapu');
INSERT INTO Lisuke (nimi) VALUES ('Vihreä Pepperoni');
INSERT INTO Lisuke (nimi) VALUES ('Kebabliha');
INSERT INTO Lisuke (nimi) VALUES ('Herkkusieni');
INSERT INTO Lisuke (nimi) VALUES ('Valkosipuli');
INSERT INTO Lisuke (nimi) VALUES ('Pepperoni');
INSERT INTO Lisuke (nimi) VALUES ('Jalopeno');
INSERT INTO Lisuke (nimi) VALUES ('Paprika');
INSERT INTO Lisuke (nimi) VALUES ('Smetana');

INSERT INTO Pizza (nimi, hinta) VALUES ('Kinkku', '7.50');
INSERT INTO Pizza (nimi, hinta) VALUES ('Salami', '7.50');
INSERT INTO Pizza (nimi, hinta) VALUES ('Tonnikala', '7.50');
INSERT INTO Pizza (nimi, hinta) VALUES ('Bolognese', '7.50');
INSERT INTO Pizza (nimi, hinta) VALUES ('Americano', '7.50');
INSERT INTO Pizza (nimi, hinta) VALUES ('Francescana', '7.50');
INSERT INTO Pizza (nimi, hinta) VALUES ('Hawaiji', '8.00');
INSERT INTO Pizza (nimi, hinta) VALUES ('Vegetariana', '8.50');
INSERT INTO Pizza (nimi, hinta) VALUES ('Superpizza', '8.50');
INSERT INTO Pizza (nimi, hinta) VALUES ('Frutti Di Mare', '8.50');
INSERT INTO Pizza (nimi, hinta) VALUES ('Kanapizza', '8.50');
INSERT INTO Pizza (nimi, hinta) VALUES ('Quattro', '8.50');
INSERT INTO Pizza (nimi, hinta) VALUES ('Julia', '8.50');
INSERT INTO Pizza (nimi, hinta) VALUES ('Madonna', '8.50');
INSERT INTO Pizza (nimi, hinta) VALUES ('Kebabpizza', '8.50');
INSERT INTO Pizza (nimi, hinta) VALUES ('Suomi Special', '8.50');
INSERT INTO Pizza (nimi, hinta) VALUES ('Torino', '8.50');

INSERT INTO PizzaJaLisukkeet (pizzanro, lisukenro) VALUES ('1', '1');

INSERT INTO Kayttaja (nimi, osoite, puhelinNro, kayttajaTunnus, salasana) VALUES ('Matti Meikäläinen', 'Valeosoite 6', '+358400500400', 'Matti666', 'qwerty');
INSERT INTO Kayttaja (nimi, osoite, puhelinNro, kayttajaTunnus, salasana) VALUES ('Pate Paksukainen', 'Valeosoite 5 C 62', '+358400555400', 'PatTheMat', 'salasana');

INSERT INTO Tilaus (tilausAika, tilauksenTila) VALUES (Now(), '0');
INSERT INTO Tilaus (tilausAika, tilauksenTila) VALUES (Now(), '1');
INSERT INTO Tilaus (tilausAika, tilauksenTila) VALUES (Now(), '2');