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
                    <input class="form-control" id="field-usermail" name="email" type="text" placeholder="Votre adresse email" value="<?= $email ?>">
                </div>
                <div class="form-group">
                    <label class="field-label" for="field-password">
                        Mot de passe
                    </label>
                    <input class="form-control" id="field-password" name="password" type="password" placeholder="Mot de passe">
                </div>

                <?php if (!empty($errorList)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach ($errorList as $currentError) : ?>
                            <?= $currentError ?><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <button href="#" class="btn btn-success" type="submit" role="button">Connexion</button>
                <a href="<?= route('user_signup')?>" class="btn btn-primary" role="button">Je n'ai pas de compte</a>
            </form>
        </div>
        
</div>

<?= view('layout/footer') ?>