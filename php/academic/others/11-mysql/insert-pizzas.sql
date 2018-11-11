-- Liste des pizzas à insèrer dans la BDD
-- - Reine (img/pizzas/reine.jpg), 8€
-- - Texan, 10€
-- - 4 fromages (img/pizzas/4-fromages.jpg), 9€
-- - Végétarienne (img/pizzas/vegetarienne.jpg), 11€
-- - Savoyarde, 13€
-- - Bolognaise, 10€
-- - Cannibale, 11€

INSERT INTO pizza (name, price, image) VALUES
('Reine', 8, 'img/pizzas/reine.jpg'),
('Texan', 10, NULL),
('4 fromages', 9.99, 'img/pizzas/4-fromages.jpg'),
('Véjétaryene', 11, 'img/pizzas/vegetarienne.jpg'),
('Savoyarde', 13, NULL),
('Bolognaise', 10, NULL),
('Cannibale', 11, NULL);

-- On change le nom d'une pizza
UPDATE pizza SET name = 'Végétarienne' WHERE id = 4;
