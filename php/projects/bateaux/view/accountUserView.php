<!-- Jumbotron -->
<div class="jumbotron text-center">
    <h2 class="card-title h2">Votre compte</h2>
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 pb-2">
        </div>
    </div>
</div>


<!-- Central Modal Warning Demo-->

<div class="modal-dialog modal-notify modal-warning modal-side modal-bottom-left" role="document">

    <div class="modal-content">

        <div class="modal-header">
            <p class="heading">Vos informations</p>
        </div>

        <div class="modal-body">
            <div class="row">
                
                <div class="col-3 text-center">
                    <img src="assets/images/defaut_portrait.png" alt="IMG of Avatars" class="img-fluid z-depth-1-half rounded-circle">
                    <div style="height: 10px"></div>
                </div>

                <div class="col-9">
                    <ul>
                        <li>
                            Nom :
                            <?= $userInfo['user_name']  ?>
                        </li>

                        <li>
                            Email :
                            <?= $userInfo['user_email']  ?>
                        </li>

                        <li>
                            Abonnement NewsLetter :
                            <?= $userInfo['news_letter'] == 1 ? "oui" : "non"  ?>
                        </li>

                        <li>
                            Vous acceptez les cookie ? :
                            <?= $userInfo['accept_cookie'] == 1 ? "oui" : "non"  ?>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <!--Footer-->
        <div class="modal-footer justify-content-center">
            <a href="modifyAccountUser.php" type="button" class="btn btn-warning"> Modifier mes informations </a>
            <a type="button" class="btn btn-outline-warning waves-effect" data-dismiss="modal"> Modifier mon mot de passe</a>
        </div>

    </div>
</div>