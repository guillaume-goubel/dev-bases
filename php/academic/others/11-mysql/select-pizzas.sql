-- Récupérer toutes les pizzas
SELECT * FROM `pizza`;
SELECT * FROM pizza;
-- SELECT * FROM `from`;

-- Récupérer les pizzas dont le prix est inférieur à 10
SELECT * FROM pizza WHERE price < 10;
-- SELECT * FROM pizza HAVING price < 10;

-- Récupérer les pizzas qui n'ont pas d'images
SELECT * FROM pizza WHERE image IS NULL;

-- Trier les pizzas de la plus cher à la moins cher
SELECT * FROM pizza ORDER BY price DESC;

-- Récupérer 3 pizzas dans un ordre aléatoire
SELECT * FROM pizza ORDER BY RAND() LIMIT 3;

-- Compter le nombre de pizzas
SELECT COUNT(id) FROM pizza;

-- Récupérer la pizza la plus cher
SELECT * FROM pizza ORDER BY price DESC LIMIT 1;
SELECT * FROM pizza WHERE price = (SELECT MAX(price) FROM pizza);


-- Calculer la moyenne de prix des pizzas
SELECT AVG(price) FROM pizza;
