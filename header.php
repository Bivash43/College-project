<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand text-light" href="index.php">Blood Distribution System</a>

        <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><i class="fas fa-align-left"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">

            <?php if (isset($_SESSION['hid'])) { ?>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark text-light" href="bloodinfo.php">Add blood samples</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark text-light" href="bloodrequest.php">Blood Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark text-light" href="abs.php">Available blood samples</a>
                    </li>
                    <li class="nav-item">
                        <a href="hprofile.php?id=<?php echo $_SESSION['hid']; ?>" class="nav-link btn font-weight-bold"><mark class="bg-dark text-light"><?php echo $_SESSION['hname']; ?></mark></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger btn-sm font-weight-bold " href="logout.php">Logout</a>
                    </li>
                </ul>

            <?php } elseif (isset($_SESSION['rid'])) { ?>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark text-light" href="sentrequest.php">Sent Blood Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark text-light" href="abs.php">Available blood samples</a>
                    </li>
                    <li class="nav-item">
                        <a href="rprofile.php?id=<?php echo $_SESSION['rid']; ?>" class="nav-link btn font-weight-bold" href="#"><mark class="bg-dark text-light"><?php echo ' ' . $_SESSION['rname']; ?></mark></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger btn-sm font-weight-bold text-light" href="logout.php">Logout</a>
                    </li>
                </ul>

            <?php } else { ?>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark text-light" href="abs.php">Available blood samples</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark text-light" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark text-light" href="login.php">Login</a>
                    </li>
                </ul>

            <?php } ?>
        </div>
    </div>
</nav>