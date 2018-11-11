<?php
// Le fichier header.php est inclus sur la page
require_once(__DIR__.'/partials/header.php');

$email = $success = null;

if (isSubmit()) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cfPassword = $_POST['cf-password'];

    $errors = [];

    if (!isValidEmail($email)) {
        $errors['email'] = 'L\'email n\'est pas valide';
    }

    if (empty($password)) {
        $errors['password'] = 'Le mot de passe est vide.';
    }

    if ($password !== $cfPassword) {
        $errors['password'] = 'Les mots de passe ne correspondent pas.';
    }

    if (emailExists($email)) {
        $errors['email'] = 'Cet email existe déjà.';
    }

    if (empty($errors)) {

        if (registerUser($email, $password)) {
            redirect('.');
        }

    }
}

?>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">S'inscrire</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-6">
                <form method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : null; ?>" type="text" name="email" value="<?php echo $email; ?>">
                        <?php if (isset($errors['email'])) { ?>
                            <div class="invalid-feedback"><?php echo $errors['email']; ?></div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : null; ?>" type="password" name="password">
                        <?php if (isset($errors['password'])) { ?>
                            <div class="invalid-feedback"><?php echo $errors['password']; ?></div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="cf-password">Confirmer le mot de passe</label>
                        <input class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : null; ?>" type="password" name="cf-password">
                    </div>
                    <button class="btn btn-block btn-primary">S'inscrire</button>
                </form>
            </div>
        </div>
    </div>

<?php
// Le fichier footer.php est inclus sur la page
require_once(__DIR__.'/partials/footer.php'); ?>
