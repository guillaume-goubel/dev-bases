-- On veut insérer des tailles pour nos pizzas
-- S (0), M (0.99), L (1.99), XL (2.99)

INSERT INTO size (name, price) VALUES
('S', 0),
('M', 0.99),
('L', 1.99),
('XL', 2.99);

-- Il faut ajouter les relations dans la table "pizza_has_size"
-- pizza_id  | size_id 
--        1  |       1
--        1  |       2
--        1  |       3
--        1  |       4
--        2  |       1
--        2  |       2

INSERT INTO pizza_has_size (pizza_id, size_id) VALUES
(1, 1), (1, 2), (1, 3), (1, 4),
(2, 1), (2, 2), (2, 3), (2, 4),
(3, 1), (3, 4),
(4, 1),
(5, 1), (5, 2), (5, 3), (5, 4),
(6, 1), (6, 2), (6, 3), (6, 4),
(7, 1), (7, 2);

-- On veut récupérer toutes les pizzas avec leurs différentes tailles et prix.
SELECT *, (pizza.price + size.price) as total FROM pizza
INNER JOIN pizza_has_size ON pizza.id = pizza_has_size.pizza_id
INNER JOIN size ON pizza_has_size.size_id = size.id
ORDER BY pizza.id, size.id ASC;






