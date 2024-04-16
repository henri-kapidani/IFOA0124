<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/IFOA0124/S2L1-cose-di-php/1-login/">Login php</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (!$user_from_db) { ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/IFOA0124/S2L1-cose-di-php/1-login/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/IFOA0124/S2L1-cose-di-php/1-login/register.php">Register</a>
                    </li><?php
                } ?>
            </ul>
            <!-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
            <?php if ($user_from_db) { ?>
                <a class="nav-link me-3" href="/IFOA0124/S2L1-cose-di-php/1-login/logout.php">Logout</a>
                <span><?= $user_from_db["username"] ?></span><?php
            } ?>
        </div>
    </div>
</nav>