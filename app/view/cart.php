<?php
	session_start();
	if($_SESSION["isLogin"] == "yes" && isset($_SESSION["username"])){
		require_once("./layout/header_signed.php");
	}
	else{
		require_once("./layout/header_unsigned.php");
	}
	require_once("./layout/footer.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Carousel Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../../src/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../../src/css/styles.css" rel="stylesheet">
</head>

<body>
    <main role="main">
        <div class="container">
            <div class="card shopping-cart">
                <div class="card-body">
                    
                    <!-- START PRODUCT -->
                    <div class="row align-items-center">
                        <div class="col-12 col-md-2 text-center">
                            <img class="img-responsive" src="https://www.hahatai.com/sites/default/files/users/u375/20161210/3%20ptt.jpg" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 col-md-6 text-center text-md-left ">
                            <h4 class="product-name">
                                <strong>Product Name</strong>
                            </h4>
                            <h4>
                                <small>Product description</small>
                            </h4>
                        </div>
                        <div class="col-12 col-md-4 text-center text-md-right row align-items-center justify-content-end">
                            <div class="row">
                                <div class="col-6 col-md-6 text-center text-md-right" style="padding-top: 5px">
                                    <h5>25.0 $</h5>
                                </div>
                                <div class="col-3 col-md-3 text-left text-md-left">
                                    <div class="input-group">
                                        <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    </div>
                                </div>
                                <div class="col-2 col-md-2 text-left text-md-left">
                                    <button type="button" class="btn btn-outline-danger btn-xs">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- END PRODUCT -->
                    <!-- START PRODUCT -->
                    <div class="row align-items-center">
                        <div class="col-12 col-md-2 text-center">
                            <img class="img-responsive" src="http://placehold.it/120x80" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 col-md-6 text-center text-md-left ">
                            <h4 class="product-name">
                                <strong>Product Name</strong>
                            </h4>
                            <h4>
                                <small>Product description</small>
                            </h4>
                        </div>
                        <div class="col-12 col-md-4 text-center text-md-right row align-items-center justify-content-end">
                            <div class="row">
                                <div class="col-6 col-md-6 text-center text-md-right" style="padding-top: 5px">
                                    <h5>25.0 $</h5>
                                </div>
                                <div class="col-3 col-md-3 text-left text-md-left">
                                    <div class="input-group">
                                        <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    </div>
                                </div>
                                <div class="col-2 col-md-2 text-left text-md-left">
                                    <button type="button" class="btn btn-outline-danger btn-xs">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- END PRODUCT -->
                    
                    <div class="container">
                        <div class="row justify-content-end">
                            <a href="" class="btn btn-outline-warning cart-update">
                                Update Cart
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                    <div class="container cart-footer">
                        <div class="row justify-content-end">
                            <h1>
                                Total Price :
                                <b>50.0$</b>
                            </h1>
                        </div>
                        <div class="row justify-content-end">
                            <a href="" class="btn btn-info">Checkout</a>
                        </div>
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
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../src/bootstrap/assets/js/vendor/popper.min.js"></script>
<script src="../../src/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="https://use.fontawesome.com/c560c025cf.js"></script>
</body>

</html>