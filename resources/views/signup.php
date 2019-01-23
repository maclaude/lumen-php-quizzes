<?= view('layout/header') ?>
<?= view('layout/nav') ?>

<div class="row">
    <h2>Se connecter</h2>
    <div id="login">

        <form action="" id="login-form" method="post" autocomplete="off">
            <div class="field">
                <label class="field-label" for="field-firstname">
                    Prénom
                </label>
                <input class="field-input" id="field-firstname" name="firstname" type="text" placeholder="Prénom"
                    data-kwimpalastatus="alive" data-kwimpalaid="1548248032175-2">
                <p class="field-info">Obligatoire - doit contenir au minimum 3 caractères</p>
            </div>
            <div class="field">
                <label class="field-label" for="field-lastname">
                    Nom
                </label>
                <input class="field-input" id="field-lastname" name="lastname" type="text" placeholder="Nom"
                    data-kwimpalastatus="alive" data-kwimpalaid="1548248032175-2">
                <p class="field-info">Obligatoire - doit contenir au minimum 3 caractères</p>
            </div>
            <div class="field">
                <label class="field-label" for="field-usermail">
                    Adresse mail
                </label>
                <input class="field-input" id="field-usermail" name="usermail" type="text" placeholder="Adresse mail"
                    data-kwimpalastatus="alive" data-kwimpalaid="1548248032175-2">
                <p class="field-info">Obligatoire</p>
            </div>
            <div class="field">
                <label class="field-label" for="field-password">
                    Mot de passe
                </label>
                <input class="field-input" id="field-password" name="password" type="password" placeholder="Mot de passe"
                    data-kwimpalastatus="alive" data-kwimpalaid="1548248032175-3">
                <p class="field-info">Obligatoire - doit contenir au minimum 3 caractères</p>
            </div>
            <div id="errors"></div>
            <button id="login-submit">Connexion</button>
        </form>
    </div>
</div>

<?= view('layout/footer') ?>