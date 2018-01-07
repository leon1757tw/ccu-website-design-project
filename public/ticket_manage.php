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

<?php
    use \Render\TicketManageRender as TicketManageRender;
    if(!isset($_GET["ticket_id"])){
        header("Location: admin.php");
    }
    extract($_GET);
    $data = new TicketManageRender($ticket_id);
    $ticket = $data->renderTicket();
    $orders = $data->renderOrder();
    $messages = $data->renderMessage();
?>

<!doctype html>
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
        <div class="container" style="margin-top: 2rem">
            <h1>修改票卷</h1>
            <hr>
        </div>
        <div class="container ticket-intro">
            <div class="row justify-content-center">
                <div class="col-lg-6 container">
                    <div class="row justify-content-center" style="margin-top:2rem;">
                        <h3><?=$ticket[0]["ticket_name"]?></h3>
                    </div>
                    <div class="row box">
                        <img src="<?=$ticket[0]["ticket_image"]?>"alt="" class="img">
                    </div>
                </div>
                <div class="col-lg-6 container ticket-intro-main">
                <form action="../app/Controller/Ticket/ticket_handler.php" method="post" id="updateTicket">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="ticketId" value="<?=$ticket[0]["ticket_id"]?>">                        
						<div class="form-group">
							<label for="ticketName">票卷名稱</label>
							<input type="text" name="ticketName" id="ticketName" class="form-control" value="<?=$ticket[0]["ticket_name"]?>" required>
						</div>
						<div class="form-group">
							<label for="ticketImage">圖片連結</label>
							<input type="text" name="ticketImage" id="ticketImage" class="form-control" value="<?=$ticket[0]["ticket_image"]?>" required>
						</div>
						<div class="form-group">
							<label for="ticketQuantity">數量</label>
							<input type="text" name="ticketQuantity" id="ticketQuantity" class="form-control" value="<?=$ticket[0]["ticket_quantity"]?>" required>
						</div>
						<div class="form-group">
							<label for="ticketPrice">價格</label>
							<input type="text" name="ticketPrice" id="ticketPrice" class="form-control" value="<?=$ticket[0]["ticket_price"]?>" required>
						</div>
						<div class="form-group">
							<label for="ticketInfo">票卷說明</label>
							<textarea name="ticketInfo" id="ticketInfo" class="form-control" rows="3" style=""><?=$ticket[0]["ticket_info"]?></textarea>
						</div>
					</form>
					<div class="row justify-content-center">
						<div col-4>
							<button class="btn btn-info" form="updateTicket">確認送出</button>
						</div>
					</div>
                </div>
            </div>
        </div>

        <div class="container" style="margin-top: 2rem;">
            <h1>訂單紀錄</h1>
            <hr>
        </div>
        <div class="container order" style="margin-bottom: 2rem;">
			<div id="accordion" role="tablist">
				<div class="card order-item">
					<div class="card-header" role="tab">
						<h5 class="mb-0">
							<a class="collapsed" data-toggle="collapse" href="#order" aria-expanded="false" aria-controls="order_100000005428">
								訂單紀錄
							</a>
						</h5>
					</div>
					<div id="order" class="collapse" role="tabpanel" data-parent="#accordion">
						<div class="card-body">
							<div class="container">
                                <div class="row order-ticket">
									<div class="col-lg-3 text-left">
                                        <p>訂單編號</p>
									</div>
									<div class="col-lg-3 text-left">
										<p>購買者</p>
									</div>
									<div class="col-lg-2 text-left">
										<p>購買數量</p>
                                    </div>
                                    <div class="col-lg-3 text-left">
										<p>購買日期</p>
									</div>
                                </div>
                                <hr>

								<?php 
									foreach($orders as $order):
								?>
									<div class="row order-ticket">
										<div class="col-lg-3">
                                            <p><?=$order["order_id"]?></p>
										</div>
										<div class="col-lg-3">
											<p><?=$order["create_user"]?></p>
										</div>
                                        <div class="col-lg-2">
                                            <p><?=$order["order_quantity"]?></p>
                                        </div>
										<div class="col-lg-4">
											<p><?=$order["create_date"]?></p>
                                        </div>
									</div>
									<hr>

                                <?php endforeach?>
                                    
							</div>
						</div>
                    </div>         
				</div>
			</div>
		</div>

        <div class="container message">
            <div class="row message-title">
                <h1>留言紀錄(<?php echo $data->renderTotalMessage();?>)</h1>
            </div>
            <hr>
            <div class="container message-main">
                <?php foreach($messages as $message):?>
                <div class="row">
                    <div class="col-12 message-main-name">
                        <p><strong><?=$message["create_user"]?></strong></p>
                    </div>
                    <div class="col-12">
                        <p><?=$message["message_content"]?></p>
                    </div>
                    <div class="col-12">
                        <p><?=$message["create_date"]?></p>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
                <?php endforeach;?>
                <form id="messageForm" action="../app/Controller/Message/message_handler.php" method="post">
                    <div class="row form-group">
                        <input type="hidden" name="ticketId" value="<?=$ticket_id?>">
                        <textarea name="messageContent" class="form-control" rows="3" placeholder="留下您的評論"></textarea>
                    </div>
                </form>
                <div class="row justify-content-end">
                    <button class="btn btn-info" form="messageForm">完成</button>
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