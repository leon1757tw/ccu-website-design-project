<?php
    require_once(__DIR__ . "/../autoload.php");
    session_start();
	if(isset($_SESSION["username"])){
		if($_SESSION["identity"] == "admin"){
			header("Location: admin.php");
		}
		require_once("layout/header_signed.php");
	} else {
		require_once("layout/header_unsigned.php");
	}
    require_once("layout/footer.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>鳳梨文創</title>

    <!-- Bootstrap core CSS -->
    <link href="../src/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../src/css/styles.css" rel="stylesheet">

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
                    use \Render\TicketListRender as TicketListRender;
                    $data = new TicketListRender();
                    $tickets = $data->renderTickets();
                    foreach($tickets as $ticket):
                ?>

                    <div class="col-lg-6">
						<a href="ticket_intro.php?ticket_id=<?=$ticket["ticket_id"]?>">
							<div class="container-overlay">
								<img src="<?=$ticket["ticket_image"]?>" alt="Avatar" class="image">
								<div class="overlay">
									<div class="text"><?=$ticket["ticket_name"]?></div>
								</div>
							</div>
						</a>
					</div>
                <?php 
                    endforeach;
                ?>

            </div>
        </div>
    </main>

    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../src/bootstrap/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../src/bootstrap/assets/js/vendor/popper.min.js"></script>
    <script src="../src/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../src/js/main.js"></script>

</body>

</html>