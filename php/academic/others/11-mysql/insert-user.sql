-- User
INSERT INTO user (name, firstname) VALUES
('Riquier', 'Zara'),
('Langley', 'Bertrand'),
('Martineau', 'Jolie'),
('Leclair', 'Nicholas'),
('Bourget', 'Clarice'),
('Daigle', 'Pierrette'),
('Deserres', 'Gradasso'),
('Plante', 'Antoinette'),
('Lesage', 'Russell');

-- Address
INSERT INTO address (name, address, zip, city, phone, user_id) VALUES
('Domicile', '27, boulevard Albin Durand', '95800', 'Cergy', '01.26.36.46.01', 1),
('Maison', '7, rue de Lille', '92600', 'Asnières-sur-Seine', '01.78.02.78.27', 2),
('Travail', '7, rue du Paillle en queue', '33500', 'Libourne', '05.89.10.28.31', 2),
('Boulot', '69, Rue de Verdun', '40000', 'Mont-de-Marsan', '05.92.93.36.72', 3),
('Maison', '4, rue de Lens', '62410', 'Hulluch', '03.00.98.53.12', 4),
('Appart', '13, rue de La Madeleine', '75002', 'Paris', '03.09.08.03.02', 5),
('My Home', '5, rue de Penthièvre', '75004', 'Paris', '03.08.54.23.23', 5),
('MAISON', '9, avenue de Paris', '62300', 'Lens', '03.65.24.61.09', 6),
('DOMICILE', '1, boulevard de Jesaispas', '59000', 'Lille', '03.99.44.14.92', 7),
('APPART', '8, rue de la Paix', '59100', 'Roubaix', '03.11.22.33.44', 7);
