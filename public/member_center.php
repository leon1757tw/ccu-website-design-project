<?php
	require_once(__DIR__ . "/../autoload.php");
	require_once("../app/Controller/auth_user.php");

	if(isset($_SESSION["username"])){
		require_once("layout/header_signed.php");
	}
	else{
		require_once("layout/header_unsigned.php");
	}
	require_once("layout/footer.php");

	use \Render\MemberCenterRender as MemberCenterRender;
	$data = new MemberCenterRender();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>鳳梨文創</title>

	<!-- Bootstrap core CSS -->
	<link href="../src/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="../src/css/styles.css" rel="stylesheet">
</head>

<body>
	<main role="main">
		<div class="container member" id="">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="ture">個人資料</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="password-modified-tab" data-toggle="tab" href="#password-modified" role="tab" aria-controls="password-modified"
					 aria-selected="false">修改密碼</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="order-tab" data-toggle="tab" href="#order" role="tab" aria-controls="order" aria-selected="false">訂單查詢</a>
				</li>
			</ul>
			<?php $account = $data->renderAccountInfo($_SESSION["username"]);?>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
					<h1>修改個人資料</h1>
					<div class="container member-item">
						<div class="row justify-content-center">
							<div class="col-lg-8">
								<form action="../app/Controller/Account/modified_account_info.php" method="post" id="modifiedAccountInfo">
									<fieldset disabled="disabled">
										<div class="form-group">
											<label for="username">帳號</label>
											<input type="text" name="username" id="username" class="form-control" value="<?=$account["username"]?>" required>
										</div>
									</fieldset>
									<div class="form-group">
										<label for="phone">手機</label>
										<input type="text" name="phone" id="phone" class="form-control" value="<?=$account["phone"]?>" required>
									</div>
									<div class="form-group">
										<label for="email">電子信箱</label>
										<input type="text" name="email" id="email" class="form-control" value="<?=$account["email"]?>" required>
									</div>
								</form>
								<div class="row justify-content-center">
									<div col-4>
										<button class="btn btn-info" form="modifiedAccountInfo">確認修改</button>
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
								<form action="../app/Controller/Account/modified_password.php" method="post" id="modifiedPassword">
									<div class="form-group">
										<label for="oldPassword">目前密碼</label>
										<input type="password" name="oldPassword" id="oldPassword" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="newPassword">新密碼</label>
										<input type="password" name="newPassword" id="newPassword" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="newPasswordCheck">確認新密碼</label>
										<input type="password" name="newPasswordCheck" id="newPasswordCheck" class="form-control" required>
									</div>
								</form>
								<div class="row justify-content-center">
									<div col-4>
										<button class="btn btn-info" form="modifiedPassword">確認修改</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- --------------------------------- -->
				<div class="tab-pane fade" id="order" role="tabpanel" aria-labelledby="order-tab">
					<h1>所有訂單</h1>
					<div class="container order">
						<div id="accordion" role="tablist">
							<div class="card order-item">
								<?php 
									$orders = $data->renderOrders($_SESSION["username"]);
									foreach($orders as $order):
								?>
								<div class="card-header" role="tab">
									<h5 class="mb-0">
										<a class="collapsed" data-toggle="collapse" href="#order_<?=$order["order_id"]?>" aria-expanded="false" aria-controls="order_100000005428">
											# <?=$order["order_id"]?>
										</a>
									</h5>
								</div>
								<div id="order_<?=$order["order_id"]?>" class="collapse" role="tabpanel" data-parent="#accordion">
									<div class="card-body">
										<div class="container">
											<?php 
												$orderItems = $data->renderOrderItems($order["order_id"]);
												foreach($orderItems as $orderItem):
													$ticket = $data->renderTicketInfo($orderItem["ticket_id"]);
											?>
											<div class="row order-ticket">
												<div class="col-lg-6 text-left">
													<a href="ticket_intro.php?ticket_id=<?=$orderItem["ticket_id"]?>">
														<p><?=$ticket["ticket_name"]?></p>
													</a>
												</div>
												<div class="col-lg-3 text-right">
													<p>x <?=$orderItem["order_quantity"]?></p>
												</div>
												<div class="col-lg-3 text-right">
													<p>$ <?=$ticket["ticket_price"]?></p>
												</div>
											</div>
											<hr>

											<?php endforeach?>
											<div class="row justify-content-end align-items-center">
												<div class="col-lg-3 mr-auto order-date">
													<?=$order["create_date"]?>
												</div>
												<div class="col-lg-3 text-right order-price">
													$ <?=$order["order_price"]?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php endforeach?>
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
	<script>window.jQuery || document.write('<script src="../src/bootstrap/assets/js/vendor/jquery.min.js"><\/script>')</script>
	<script src="../src/bootstrap/assets/js/vendor/popper.min.js"></script>
	<script src="../src/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
	<script src="../src/bootstrap/assets/js/vendor/holder.min.js"></script>
</body>

</html>