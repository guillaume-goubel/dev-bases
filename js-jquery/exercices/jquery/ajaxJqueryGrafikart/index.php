<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>

    </title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/styles/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/styles/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/css/styles.min.css">

</head>

<body>

    <?php 
require_once __DIR__.'/config/database.php'; 

$query = $db->query('SELECT * FROM products ORDER BY id_products DESC');
$query ->execute();
$results = $query ->fetchAll(); ?>

    <div class="container">
    
    <h1>PRODUITS</h1>

        <form id="form-add" method="POST" action="add.php" class="form-inline">

            <input type="text" name="names" placeholder="titre">
            <button type="submit" class="btn btn-primary">Ajouter</button>

        </form>

        <table class="table table-striped">

            <thead>

                <tr>
                    <td></td>
                    <td>Titre</td>
                    <td>Action</td>
                </tr>

            </thead>

            <tbody>

                <?php foreach ($results as $key => $result):?>

                <tr>

                    <td></td>
                    <td>
                        <?= $result['names'] ?>
                    </td>
                    <td>
                        <a href="delete.php?id=<?=$result['id_products']?>" type="button" class="btn btn-danger">Effacer</a>
                    </td>

                </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>


    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting
                    started guide</a>.</p>
        </div>
    </footer>

    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <script src="assets/js/app.js"></script>

</body>

</html>