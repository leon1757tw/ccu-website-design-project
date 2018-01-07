<?php
	session_start();
	require_once(__DIR__ . "/../autoload.php");
	if(isset($_SESSION["username"])){
		if($_SESSION["identity"] == "admin"){
			require_once("layout/header_admin.php");
		} else {
			header("Location: index.php");
		}
	} else {
		header("Location: index.php");
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
		<div class="container">
			<div class="row" id="hot-event" style="margin-top: 2rem">
				<h1 class="col-lg-4">我的票卷</h1>
			</div>
			<hr>

			<div class="row justify-content-start">

				<?php
					use \Render\AdminRender as AdminRender;
					$data = new AdminRender();
					ini_set('display_errors', 1);
					$tickets = $data->renderOwnTickets($_SESSION["username"]);
					foreach($tickets as $ticket):
				?>

					<div class="col-lg-6">
						<a href="ticket_manage.php?ticket_id=<?=$ticket["ticket_id"]?>">
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

		<div class="container">
			<div class="row" id="" style="margin-top: 2rem">
			<h1 class="col-lg-4">新增票卷</h1>
			</div>
			<hr>
		</div>

		<div class="container">
			<div class="row justify-content-center" style="padding-bottom:3rem;">
				<div class="col-lg-8">
					<form action="../app/Controller/Ticket/ticket_handler.php" method="post" id="addTicket">
						<input type="hidden" name="action" value="add">
						<div class="form-group">
							<label for="ticketName">票卷名稱</label>
							<input type="text" name="ticketName" id="ticketName" class="form-control" value="" required>
						</div>
						<div class="form-group">
							<label for="ticketImage">圖片連結</label>
							<input type="text" name="ticketImage" id="ticketImage" class="form-control" value="" required>
						</div>
						<div class="form-group">
							<label for="ticketQuantity">數量</label>
							<input type="text" name="ticketQuantity" id="ticketQuantity" class="form-control" value="" required>
						</div>
						<div class="form-group">
							<label for="ticketPrice">價格</label>
							<input type="text" name="ticketPrice" id="ticketPrice" class="form-control" value="" required>
						</div>
						<div class="form-group">
							<label for="ticketInfo">票卷說明</label>
							<textarea name="ticketInfo" id="ticketInfo" class="form-control" value="" rows="3" style="resize: none;"></textarea>
						</div>
					</form>
					<div class="row justify-content-center">
						<div col-4>
							<button class="btn btn-info" form="addTicket">確認送出</button>
						</div>
					</div>
				</div>
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