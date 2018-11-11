<?php
// Le fichier header.php est inclus sur la page
require_once(__DIR__.'/partials/header.php');

$email = $success = null;

if (isSubmit()) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = [];

    $user = validUser($email, $password);

    if ($user) {
        login($user);
        redirect('.');
    }

    if (!$user) {
        $errors['email'] = 'Erreur d\'authentification';
    }
}

?>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Se connecter</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-6">
                <form method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : null; ?>" type="email" name="email" value="<?php echo $email; ?>">
                        <?php if (isset($errors['email'])) { ?>
                            <div class="invalid-feedback"><?php echo $errors['email']; ?></div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input class="form-control" type="password" name="password">
                    </div>
                    <button class="btn btn-block btn-primary">Se connecter</button>
                </form>
            </div>
        </div>
    </div>

<?php
// Le fichier footer.php est inclus sur la page
require_once(__DIR__.'/partials/footer.php'); ?>
