<body>
    <nav class="navbar" id="ma-navbar">
        <img class="logo" src="image/logo1.png">
        <span class="nav-button">
            <svg viewBox="0 0 100 80" width="40" height="40">
                <rect width="1000" height="15"></rect>
                <rect y="35" width="1000" height="15"></rect>
                <rect y="70" width="1000" height="15"></rect>
            </svg>
        </span>
        <ul class="nav-menu ">
            <?php if(!$_SESSION["personnelle"]) :?>
                <li class="li-menu"><a href="seconnecter.php">Login</a></li>
                <li class="li-menu"><a href="inscription.php">Inscrir</a></li>
                <?php else : ?>
                    <?php if(!$_SESSION["admin"]) : ?>
                <li class="li-menu"><a href="deconnection.php">Deconnecter</a></li>
                <?php endif; ?>
                <li class="li-menu"><a href="reservation.php">Reserver</a></li>
                <li class="li-menu"><a href="salles.php">Salles</a></li>
                <li class="li-menu"><a href="lereservation.php">Reservation</a></li>
                <?php if(!$_SESSION["admin"]) : ?>
                <li class="li-menu"><a href="admine.php">Admine</a></li>
                <?php endif; ?>
                <?php if($_SESSION["admin"]) : ?>
                    <li class="li-menu"><a href="ajouAdmin.php">A-admin</a></li>
                    <li class="li-menu"><a href="gerequipement.php">G-equipement</a></li>
                    <li class="li-menu"><a href="gerereservation.php">G-reservation</a></li>
                    <li class="li-menu"><a href="geresalle.php">G-salle</a></li>
                    <li class="li-menu"><a href="deconnectAdmin.php">Quitter</a></li>
                <?php endif; ?>
            <?php endif; ?>

        </ul>
    </nav>