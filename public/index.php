<?php
	session_start();
	require_once(__DIR__ . "/../autoload.php");
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
	<meta name="description" content="">
	<meta name="author" content="">

	<title>鳳梨文創</title>

	<link href="../src/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="../src/css/styles.css" rel="stylesheet">
</head>

<body>
	<main role="main">
		<div class="container v-header">
    		<div class="fullscreen-video-wrap">  
				<video id="home_video"controls muted autoplay="" loop="">
					<source src="../src/video/homepage_video.mp4" type="video/mp4">
					<script>
						document.getElementById('home_video').addEventListener('loadedmetadata', function(){
  							this.currentTime = 30;}, false);
					</script>
    			</video>
    		</div>
    		<div class="header-overlay"></div>
    		<div class="header-content text-center">
				<div class="container">
					<div class="row">
						<div class="col-12 justify-content-center">
							<h1>鳳 梨 文 創</h1>
						</div>
					</div>
					<div class="row">
						<div class="col-12 justify-content-center">
							<p>一種風景~可以欣賞
							一所學校~可以學習
							一座舞台~可以展現成果揮灑能量
							一本書~紀錄下我們從過去到未來的努力軌跡充實自己</p>
						</div>
					</div>
					<a class="btn btn-info btn-more" href="#hot-event">V I E W</a>
				</div>
    		</div>
		</div>

		<div class="container">
			<div class="row" id="hot-event">
				<h1 class="col-lg-4">最新活動</h1>
			</div>
			<hr>

			<div class="row justify-content-center">

				<?php
					use \Render\IndexRender as IndexRender;
					$data = new IndexRender();
					$tickets = $data->renderTickets();
					for($count = 0; $count < 2; $count++):
				?>
					<div class="col-lg-6">
						<a href="ticket_intro.php?ticket_id=<?=$tickets[$count]["ticket_id"]?>">
							<div class="container-overlay">
								<img src="<?=$tickets[$count]["ticket_image"]?>" alt="Avatar" class="image">
								<div class="overlay">
									<div class="text"><?=$tickets[$count]["ticket_name"]?></div>
								</div>
							</div>
						</a>
					</div>

				<?php
					endfor;
				?>

			</div>
		</div>

		<div class="container">
			<div class="row justify-content-center">
				<a href="ticket_list.php" class="btn btn-outline-info btn-more">
					<b>M O R E</b>
				</a>
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
	<script src="../src/bootstrap/assets/js/vendor/holder.min.js"></script>
</body>

</html>