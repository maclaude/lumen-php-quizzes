<?= view('layout/header') ?>
<?= view('layout/nav') ?>

<div>
    <h2>Créer votre compte</h2>
        <div id="login">
            <form action="" id="login-form" method="post" autocomplete="off">
                <div class="form-group">
                    <label class="field-label" for="field-firstname">
                        Prénom
                    </label>
                    <input class="form-control" id="field-firstname" name="firstname" type="text" placeholder="Prénom">
                </div>
                <div class="form-group">
                    <label class="field-label" for="field-lastname">
                        Nom
                    </label>
                    <input class="form-control" id="field-lastname" name="lastname" type="text" placeholder="Nom">
                </div>
                <div class="form-group">
                    <label class="field-label" for="field-usermail">
                        Adresse mail
                    </label>
                    <input class="form-control" id="field-usermail" name="usermail" type="text" placeholder="Votre adresse email">
                </div>
                <div class="form-group">
                    <label class="field-label" for="field-password">
                        Mot de passe
                    </label>
                    <input class="form-control" id="field-password" name="password" type="password" placeholder="Mot de passe">
                </div>
                <button href="" class="btn btn-primary" type="submit" role="button">Inscription</button>
                <a href="<?= route('signin')?>" class="btn btn-primary" role="button">J'ai déjà un compte</a>
                <!-- A retirer lorsque la connexion sera effective -->
                <a class="btn btn-primary" href="<?= route('account') ?>" role="button">Accès au compte sans connexion (beta)</a>
            </form>
        </div>
</div>

<?= view('layout/footer') ?>