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

<?php
    use \Render\TicketIntroRender as TicketIntroRender;
    if(!isset($_GET["ticket_id"])){
        header("Location: index.php");
    }
    extract($_GET);
    $data = new TicketIntroRender($ticket_id);
    $ticket = $data->renderTicket();
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
        <div class="container ticket-intro">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="box">
                        <img src="<?=$ticket[0]["ticket_image"]?>"
                            alt="" class="img">
                    </div>
                </div>
                <div class="col-lg-6 container ticket-intro-main">
                    <div class="row ticket-intro-name">
                        <h1><?=$ticket[0]["ticket_name"]?></h1>
                    </div>
                    <hr>
                    <div class="row ticket-intro-info">
                        <?=$ticket[0]["ticket_info"]?>
                    </div>
                    <div class="row justify-content-center ticket-intro-sub">
                        <div class="col-12 text-center ticket-intro-price">
                            <p>$ <?=$ticket[0]["ticket_price"]?></p>
                        </div>
                        <div class="col-12 text-center">
                            <form action="../app/Controller/Cart/cart_handler.php" method="get">
									<input type="hidden" name="action" value="add">
									<input type="hidden" name="ticket_id" value="<?=$ticket[0]["ticket_id"]?>">
									<input type="hidden" name="ticket_name" value="<?=$ticket[0]["ticket_name"]?>">
									<input type="hidden" name="ticket_price" value="<?=$ticket[0]["ticket_price"]?>">
									<input type="submit" value="加到購物車" class="btn btn-warning">
							</form>
                        </div>
                        <div class="col-12 text-center ticket-intro-quantity">
                            <p>剩餘數量 : <strong><?=$ticket[0]["ticket_quantity"]?></strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container message">
            <div class="row message-title">
                <h1>留言(<?php echo $data->renderTotalMessage();?>)</h1>
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