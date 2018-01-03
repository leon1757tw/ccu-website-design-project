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
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Carousel Template for Bootstrap</title>

	<!-- Bootstrap core CSS -->
	<link href="../../src/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="../../src/css/styles.css" rel="stylesheet">
</head>

<body>
	<main role="main">
		<div class="container">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
						<div class="container">
							<div class="carousel-caption text-left">
								<h1>Example headline.</h1>
								<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam
									id dolor id nibh ultricies vehicula ut id elit.</p>
								<p>
									<a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a>
								</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
						<div class="container">
							<div class="carousel-caption">
								<h1>Another example headline.</h1>
								<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam
									id dolor id nibh ultricies vehicula ut id elit.</p>
								<p>
									<a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a>
								</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
						<div class="container">
							<div class="carousel-caption text-right">
								<h1>One more for good measure.</h1>
								<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam
									id dolor id nibh ultricies vehicula ut id elit.</p>
								<p>
									<a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a>
								</p>
							</div>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<h1 class="col-lg-4">最新活動</h1>
			</div>
			<hr>
			<div class="row justify-content-center">

			<?php
				$tickets = $data->getAllTickets();
				for($count = 0; $count < 3; $count++):
			?>
				<div class="col-lg-4 flip-container" ontouchstart="this.classList.toggle('hover');">
					<div class="flipper">
						<div class="front">
							<img class="card-img-top" src="https://shyfyy.files.wordpress.com/2017/09/pitchperfect3-2.jpg"
							 alt="Card image cap">
							<div class="card-img-overlay">
								<h4>
									<strong><?=$tickets[$count]["ticket_name"]?></strong>
								</h4>
							</div>
						</div>
						<div class="back">
							<!-- back content -->
							<div class="card-body text-center">
								<p class="card-title"><?=$tickets[$count]["ticket_name"]?></p>
								<p class="card-info"><?=$tickets[$count]["ticket_info"]?></p>
								<p class="card-price">$<?=$tickets[$count]["ticket_price"]?></p>
								<button type="button" class="btn btn-warning">Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
			<?php
				endfor;
			?>

			<!-- SAMPLE
				<div class="col-lg-4 flip-container" ontouchstart="this.classList.toggle('hover');">
					<div class="flipper">
						<div class="front">
							<img class="card-img-top" src="https://cdn.images.express.co.uk/img/dynamic/36/590x/secondary/STAR-WARS-8-POSTER-1090884.jpg"
							 alt="Card image cap">
							<div class="card-img-overlay">
								<h4>
									<strong>Star Wars: Episode VIII - The Last Jedi </strong>
								</h4>
							</div>
						</div>
						<div class="back">
							<div class="card-body text-center">
								<p class="card-title">Ticket Name</p>
								<p class="card-info">Re newly discovered abilities with the guidance of Luke Skywalker, who is unsettled by the strength</p>
								<p class="card-price">$100</p>
								<button type="button" class="btn btn-warning">Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
			-->
			</div>
		</div>

		<div class="container">
			<div class="row justify-content-center">
				<a href="./ticket.php" class="btn btn-outline-info btn-more">
					<b>M O R E</b>
				</a>
			</div>
		</div>
		<!-- /.container -->
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
	<script src="../../src/bootstrap/assets/js/vendor/holder.min.js"></script>
</body>

</html>