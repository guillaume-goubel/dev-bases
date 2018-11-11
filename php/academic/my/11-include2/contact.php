<?php
require_once __DIR__.'/partials/header.php';
?>

<main>

    <div class="container">

        <form action="index.php" method="POST">

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control" placeholder="Votre email" name="emailUser" value="<?php echo !empty($_POST) ? $_POST['emailUser'] : null; ?>">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">//</span>
                </div>
                <input type="text" class="form-control" placeholder="Sujet du post" name="subjectUser" value="<?php echo !empty($_POST) ? $_POST['subjectUser'] : null; ?>">
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Votre message</span>
                </div>
                <textarea class="form-control" placeholder="Votre message" aria-label="With textarea" name="messageUser"
                    value="<?php echo !empty($_POST) ? $_POST['messageUser'] : null; ?>"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>

        </form>

    </div>

</main>

<?php
require_once __DIR__.'/partials/footer.php';
?>