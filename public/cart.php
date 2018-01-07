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
    <title>鳳梨文創</title>

    <!-- Bootstrap core CSS -->
    <link href="../src/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../src/css/styles.css" rel="stylesheet">
</head>

<body>
    <main role="main">
        <?php
            use \Render\CartRender as CartRender; 
            $data = new CartRender;
            $items = $data->renderCartItems();
            if(!empty(array_filter($items))):
        ?>
            <div class="container">
                <div class="card shopping-cart">
                    <div class="card-body">

                        <?php 
                            foreach($items as $item_id => $item_attributes):
                        ?>
                            <div class="row align-items-center">
                                <div class="col-12 col-md-2 text-center">
                                    <img class="img-responsive" src="https://www.hahatai.com/sites/default/files/users/u375/20161210/3%20ptt.jpg" alt="prewiew"
                                        width="120" height="80">
                                </div>
                                <div class="col-12 col-md-6 text-center text-md-left">
                                    <a href="ticket_intro.php?ticket_id=<?=$item_id?>">
                                        <h4 class="product-name">
                                            <strong><?=$item_attributes["name"]?></strong>
                                        </h4>
                                    </a>
                                </div>
                                <div class="col-12 col-md-4 text-center text-md-right row align-items-center justify-content-end">
                                    <div class="row">
                                        <div class="col-6 col-md-6 text-center text-md-right" style="padding-top:5px">
                                            <h5>$ <?=$item_attributes["price"]?></h5>
                                        </div>
                                        <div class="col-3 col-md-3 text-left text-md-left">
                                            <form action="../app/Controller/Cart/cart_handler.php" method="GET">
                                                <input type="text" name="quantity" value="<?=$item_attributes["quantity"]?>" onchange="this.form.submit()" class="form-control" >
                                                <input type="hidden" name="action" value="update">
                                                <input type="hidden" name="ticket_id" value="<?=$item_id?>">
                                            </form>
                                        </div>
                                        <div class="col-2 col-md-2 text-left text-md-left">
                                            <form action="../app/Controller/Cart/cart_handler.php" method="GET">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="ticket_id" value="<?=$item_id?>">
                                                <input type="submit" class="btn btn-outline-danger btn-xs" value="x">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            
                            <?php endforeach;?>
                    </div>
        
                    <div class="card-footer">
                        <div class="container cart-footer">
                            <div class="row justify-content-end">
                                <h1>
                                    <b>$ <?php echo $data->renderCartTotalPrice();?></b>
                                </h1>
                            </div>
                            <div class="row justify-content-end">
                                <a href="../app/Controller/Order/order_handler.php?action=create" class="btn btn-info">確定結帳</a>
                            </div>
                        </div>
                    </div>   
                         
                </div>
            </div>
            
        <?php else:?>

            <div class="container">
                <div class="row justify-content-center" style="margin-top:10rem">
                    <h1 style="text-align: center">尚無商品</h1>
                </div>
                <div class="row justify-content-center" style="margin:2rem 0rem;">
                    <a href="ticket_list.php" class="btn btn-info" style="padding:0.5rem 1.5rem;">
                        繼續購物
                    </a>
                </div>
            </div>

        <?php endif;?>
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
    <script src="https://use.fontawesome.com/c560c025cf.js"></script>
</body>

</html>