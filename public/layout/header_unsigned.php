<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h5 class="modal-title" id="loginModalLabel">登入會員</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="../app/Controller/Account/login.php" method="post" id="loginForm">
					<div class="form-group">
						<input type="text" name="username" class="form-control" placeholder="帳號" required>
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="密碼" required>
					</div>
					<a href="#registerModal" data-dismiss="modal" data-toggle="modal"> 按此註冊 ></a>
				</form>
			</div>

			<div class="modal-footer">
				<button type="submit" class="btn btn-info" form="loginForm" value="Login">登入</button>
			</div>
		</div>
	</div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalTitle" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="registerModal">註冊會員</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="../app/Controller/Account/register.php" method="post" id="registerForm">
					<div class="form-group form-row justify-content-center">
						<label class="custom-control custom-radio">
							<input id="userIdentity" name="identity" value="user" type="radio" class="custom-control-input" required>
							<span class="custom-control-indicator"></span>
							<span class="custom-control-description">一般使用者</span>
						</label>
						<label class="custom-control custom-radio">
							<input id="adminIdentity" name="identity" value="admin" type="radio" class="custom-control-input" required>
							<span class="custom-control-indicator"></span>
							<span class="custom-control-description">售票者</span>
						</label>
					</div>
					<div class="form-group">
						<label for="username">帳號</label>
						<input type="text" name="username" id="username" class="form-control" placeholder="請輸入帳號" required>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="password">密碼</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="請輸入密碼" required>
						</div>
						<div class="form-group col-md-6">
							<label for="passwordcheck">密碼確認</label>
							<input type="password" name="passwordCheck" id="passwordcheck" class="form-control" placeholder="請再次輸入密碼" required>
						</div>
					</div>
					<div class="form-group">電子信箱
						<label for="phone">電話</label>
						<input type="text" name="phone" id="phone" class="form-control" placeholder="09XX-XXX-XXX" required>
					</div>
					<div class="form-group">
						<label for="email">電子信箱</label>
						<input type="text" name="email" id="email" class="form-control" placeholder="example@pineapple.com" required>
					</div>
				</form>
			</div>

			<div class="modal-footer">
				<button type="submit" class="btn btn-info" form="registerForm" value="Register">註冊</button>
			</div>
		</div>
	</div>
</div>

<header>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<a class="navbar-brand" href="index.php">鳳 梨 文 創</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"
		 aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="cart.php">
						<img src="../src/img/cd-cart.svg" alt="Cart" class="cart-icon">
						<div class="badge badge-pill badge-light">
							<?php
								require_once(__DIR__ . "/../../autoload.php");
								use \Render\HeaderRender as HeaderRender;
								$data = new HeaderRender();
								echo $data->renderCartTotalItem();
							?>
						</div>
					</a>
				</li>
			</ul>
			<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#loginModal">登入</button>
		</div>
	</nav>
</header>