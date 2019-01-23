<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <ul class="nav mr-auto">
        <li class="nav-item">
            <a class="nav-link d-inline text-blue" href="<?= route('home') ?>">
            <h1 >O'Quiz</h1>
            </a>
        </li>
    </ul>

    <ul class="nav nav-pills justify-content-end">
        <li class="nav-item">
            <a class="nav-link inactive" href="<?= route('home') ?>">
                <i class="fas fa-home"></i>
                Accueil
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-blue active " href="<?= route('signin') ?>">
                <i class="fas fa-user"></i>
                Mon compte
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-blue" href="<?= route('logout') ?>">
                <i class="fas fa-sign-out-alt"></i>
                Déconnexion
            </a>
        </li>

    </ul>
</nav>