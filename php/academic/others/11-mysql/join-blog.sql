-- Créer une base de données "blogjoin" dans PHPMyAdmin
-- Créer 2 tables article et user
-- Dans article, on aura un id, un titre, un auteur (Pourra être null)
-- Dans user, on aura un id et un nom

-- Left JOIN: Récupére tous les articles, anonymes ou non
-- SELECT * FROM article a
-- LEFT JOIN user u ON a.author_id = u.id;
SELECT * FROM article
LEFT JOIN user ON article.author_id = user.id;

-- Inner join : Récupére les articles qui ne sont pas anonymes
SELECT * FROM article
INNER JOIN user ON article.author_id = user.id;

-- Right join : Récupére les auteurs qui ont écrit ou pas un article
SELECT * FROM article
RIGHT JOIN user ON article.author_id = user.id

-- Récupére les articles anonymes seulement
SELECT * FROM article
LEFT JOIN user ON article.author_id = user.id
WHERE user.id IS NULL;

-- Récupére les auteurs qui n'ont pas écrit d'articles
SELECT * FROM article
RIGHT JOIN user ON article.author_id = user.id
WHERE article.id IS NULL;
