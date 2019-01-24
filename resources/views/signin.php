<?= view('layout/header') ?>
<?= view('layout/nav') ?>

<div>
    <h2>Se connecter</h2>
    <div id="login">
            <form action="" id="login-form" method="post" autocomplete="off">
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
                <button href="" class="btn btn-primary" type="submit" role="button">Connexion</button>
                <a href="<?= route('signup')?>" class="btn btn-primary" role="button">Je n'ai pas de compte</a>
            </form>
        </div>
</div>

<?= view('layout/footer') ?>