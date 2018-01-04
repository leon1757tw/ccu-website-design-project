<?php
    require_once("./../controllers/data.php");

	session_start();
	if($_SESSION["isLogin"] == "yes" && isset($_SESSION["username"])){
		require_once("./layout/header_signed.php");
	}
	else{
		require_once("./layout/header_unsigned.php");
	}
    require_once("./layout/footer.php");

    $data = new Data();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Carousel Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../../src/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../../src/css/styles.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
    <main role="main">
        <div class="container ticket-title">
            <div class="row justify-content-center">
                <h1>立即探索</h1>
            </div>
            <div class="row justify-content-center">
                <input class="form-control" id="search" type="text" placeholder="Search">
            </div>
        </div>
        <hr>
        <div class="container ticket-content">
            <div class="row justify-content-start" id="items">

                <?php
                    $tickets = $data->getAllTickets();
                    foreach($tickets as $ticket):
                ?>
                    <div class="col-lg-4">
                        <a href="?ticket_id=<?=$ticket["ticket_id"]?>">
                            <div class="card">
                                <img class="card-img-top" src="https://movies.tw.campaign.yahoo.net/i/o/production/movies/November2017/ZxDuquO7HpwEdS5KalL7-2037x2906.jpg" alt="Card image cap">
                                <div class="card-img-overlay">
                                    <h4>
                                        <strong><?=$ticket["ticket_name"]?></strong>
                                    </h4>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php 
                    endforeach;
                ?>

                <!-- Sample
                <div class="col-lg-4">
                    <a href="">
                        <div class="card">
                            <img class="card-img-top" src="https://movies.tw.campaign.yahoo.net/i/o/production/movies/November2017/ZxDuquO7HpwEdS5KalL7-2037x2906.jpg"
                                alt="Card image cap">
                            <div class="card-img-overlay">
                                <h4>
                                    <strong>The Greatest Showman</strong>
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>
                -->

            </div>
        </div>
    </main>

    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../src/bootstrap/assets/js/vendor/popper.min.js"></script>
    <script src="../../src/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="./../../src/js/main.js"></script>

</body>

</html>