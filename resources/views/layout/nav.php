<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <ul class="nav mr-auto">
        <li class="nav-item">
            <a class="nav-link d-inline text-blue" href="<?= route('quiz_list') ?>">
            <h1 >O'Quiz</h1>
            </a>
        </li>
    </ul>

    <ul class="nav nav-pills justify-content-end">
        <li class="nav-item">
            <a class="nav-link inactive" href="<?= route('quiz_list') ?>">
                <i class="fas fa-list"></i>
                Accueil
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-blue active " href="<?= route('user_signin') ?>">
                <i class="fas fa-user"></i>
                Mon compte
            </a>
        </li>

        <?php if($isConnected && $isAdmin) : ?>
        <li class="nav-item">
            <a class="nav-link text-blue active " href="<?= route('admin_interface') ?>">
                <i class="fas fa-user"></i>
                Mon espace administrateur
            </a>
        </li>
        <?php endif; ?>

        <li class="nav-item">
            <a class="nav-link text-blue" href="<?= route('user_logout') ?>">
                <i class="fas fa-sign-out-alt"></i>
                Déconnexion
            </a>
        </li>

    </ul>
</nav>