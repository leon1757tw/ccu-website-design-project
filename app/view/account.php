<?php
	//require_once("./../controllers/auth.php");
	if($_SESSION["isLogin"] == "yes" && isset($_SESSION["username"])){
		require_once("./layout/header_signed.php");
	}
	else{
		require_once("./layout/header_unsigned.php");
	}
	require_once("./layout/footer.php");
?>


<!DOCTYPE html>
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
		<div class="container member" id="">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true">個人資料</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="password-modified-tab" data-toggle="tab" href="#password-modified" role="tab" aria-controls="password-modified"
					 aria-selected="false">修改密碼</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" id="order-tab" data-toggle="tab" href="#order" role="tab" aria-controls="order" aria-selected="false">訂單查詢</a>
				</li>
			</ul>

			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
					<h1>修改個人資料</h1>
					<div class="container member-item">
						<div class="row justify-content-center">
							<div class="col-lg-8">
								<form action="" method="post" id=" ??? ">
									<fieldset disabled="disabled">
										<div class="form-group">
											<label for="username">Username</label>
											<input type="text" name="username" id="username" class="form-control" value="<?php echo $_SESSION[" username "];?>" required>
										</div>
									</fieldset>
									<div class="form-group">
										<label for="phone">Phone</label>
										<input type="text" name="phone" id="phone" class="form-control" value="<?php echo $_SESSION[" username "];?>" required>
									</div>
									<div class="form-group">
										<label for="email">Email</label>
										<input type="text" name="email" id="email" class="form-control" value="<?php echo $_SESSION[" username "];?>" required>
									</div>
								</form>
								<div class="row justify-content-center">
									<div col-4>
										<button class="btn btn-info">確認修改</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="password-modified" role="tabpanel" aria-labelledby="password-modified-tab">
					<h1>修改密碼</h1>
					<div class="container member-item">
						<div class="row justify-content-center">
							<div class="col-lg-8">
								<form action="" method="post" id=" ??? ">
									<div class="form-group">
										<label for="password">* 目前密碼</label>
										<input type="password" name="password" id="password" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="passwordcheck">* 新密碼</label>
										<input type="password" name="passwordCheck" id="passwordcheck" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="passwordcheck">* 確認新密碼</label>
										<input type="password" name="passwordCheck" id="passwordcheck" class="form-control" required>
									</div>
								</form>
								<div class="row justify-content-center">
									<div col-4>
										<button class="btn btn-info">確認修改</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- --------------------------------- -->
				<div class="tab-pane fade show active" id="order" role="tabpanel" aria-labelledby="order-tab">
					<h1>所有訂單</h1>
					<div class="container order">
						<div id="accordion" role="tablist">
							<div class="card order-item">
								<div class="card-header" role="tab">
									<h5 class="mb-0">
										<a class="collapsed" data-toggle="collapse" href="#order_100000005428" aria-expanded="false" aria-controls="order_100000005428">
											# order_id
										</a>
									</h5>
								</div>
								<div id="order_100000005428" class="collapse" role="tabpanel" data-parent="#accordion">
									<div class="card-body">
										<div class="container">
											<div class="row order-ticket align-items-center">
												<div class="col-lg-6 text-left">
													<a href="">
														<p>The Greatest Showman
															<!--ticket_name-->
														</p>
													</a>
												</div>
												<div class="col-lg-3 text-right">
													<p>x 2
														<!--order_quantity-->
													</p>
												</div>
												<div class="col-lg-3 text-right">
													<p>$599
														<!--ticket_price-->
													</p>
												</div>
											</div>
											<hr>
											<div class="row order-ticket">
												<div class="col-lg-6 text-left">
													<a href="">
														<p>The Greatest Showman
															<!--ticket_name-->
														</p>
													</a>
												</div>
												<div class="col-lg-3 text-right">
													<p>x 2
														<!--order_quantity-->
													</p>
												</div>
												<div class="col-lg-3 text-right">
													<p>$599
														<!--ticket_price-->
													</p>
												</div>
											</div>
											<hr>
											<div class="row justify-content-end align-items-center">
												<div class="col-lg-3 mr-auto order-date">
													2017/01/03 16:30:17
													<!--order_create_date-->
												</div>
												<div class="col-lg-3 text-right order-price">
													$ 100
													<!--order_price-->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
				<!-- --------------------------------- -->
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
	<script src="../../src/bootstrap/assets/js/vendor/holder.min.js"></script>
</body>

</html>