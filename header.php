<?php session_start();
$cartcount=0;
$gt=0;

if(isset($_SESSION["cart"]))
{
	$cartcount= count($_SESSION["cart"]);
	for($i=0;$i<$cartcount;$i++)
	{
		 @$subtotal += $_SESSION["cart"][$i]["Price"] * $_SESSION["cart"][$i]["Quantity"]; 
		 @$tax= $subtotal*20/100;
	}
	$gt = @$subtotal+@$tax;
}

?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Shop</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
   
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="img/logo.png" style="width:100px; height:100px;"></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.php">Cart - <span class="cart-amunt">Rs. <?php echo @$gt?></span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo @$cartcount; ?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div> 

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav" style="width:100%;">

                    <!-- ✅ Categories Left -->
                    <li class="active"><a href="index.php">Home</a></li>
                    <?php
                    include("admin/config.php");
                    $exe = mysqli_query($connect,"SELECT * FROM categorytable");
                    while($row = mysqli_fetch_array($exe)){
                        echo '<li><a href="shop.php?c_id='.$row["cat_id"].'">'.$row["cat_name"].'</a></li>';
                    }
                    ?>

                    <!-- ✅ Right Side Login/Register/Logout -->
                    <li style="margin-left:auto; display:flex; align-items:center; gap:10px;">

                        <?php if(isset($_SESSION['user_name'])) { ?>
                            <!-- ✅ Show Username and Logout -->
                            <span style="color:white; font-weight:bold;">👤 <?php echo $_SESSION['user_name']; ?></span>
                            <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>

                        <?php } else { ?>
                            <!-- ✅ Show Only Register -->
                            <a href="register.php" class="btn btn-success btn-sm">Register</a>
                        <?php } ?>

                    </li>
                </ul>
            </div>  
        </div>
    </div>
</div>
