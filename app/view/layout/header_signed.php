<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="./index.php">THEATER</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./cart.php">
                        <img src="./../../src/img/cd-cart.svg" alt="" style="width:1.5rem">
                        <div class="badge badge-pill badge-light">
                            <?php
								require_once("./../controllers/data.php");
								$data = new Data();
								echo $data->getCartTotalItems();
							?>
                        </div>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <?php echo $_SESSION["username"];?> 
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="./member_center.php">My Account</a>
                        <a class="dropdown-item" href="./member_center.php">Order</a>
                        <a class="dropdown-item" href="../controllers/logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>