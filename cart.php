<?php 

include("header.php");
?>


<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> 



<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
               <?php
			   
			   if(isset($_POST["btncart"]))
			   {	
			   echo "<script>window.location.href='cart.php'</script>";
				   if(!isset($_SESSION["cart"]))
				   {
					   $_SESSION["cart"] = array();
				}
				   
				   //----------------------get hide values
				  $id = $_POST["hide_id"];
				  $name = $_POST["hide_name"];
				  $image = $_POST["hide_image"];
				  $price = $_POST["hide_price"];
			      $qty = $_POST["quantity"];
				  
				  $IsExist = false;
				  
				  $count = count($_SESSION["cart"]);
				  $_SESSION["count"]=  $count ;
				  if($count>0)
				  {
					  for($x=0 ; $x<$count;$x++)
					  {
						  if($_SESSION["cart"][$x]["ID"] ==  $id )
						  {
							  
							  $_SESSION["cart"][$x]["Quantity"]= $_SESSION["cart"][$x]["Quantity"]+ $qty ;
							   $IsExist = true;
						  }
					  }
					  
					 }
				  
				  
				  
				  if(!$IsExist)
				  {
					  
					  array_push($_SESSION["cart"],array("ID"=>$id,"Name"=>$name,"Image"=>$image,"Price"=>$price,"Quantity"=>$qty));
				  }
				  
			}
			 	   		   
		   ?>
           <?php
		   if(!empty($_SESSION["cart"]))
		   {
			   
			
		   
		   ?>
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="checkout.php">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                    
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
									if(isset($_SESSION["cart"]))
									{
										
										$subtotal=0;
										$tax =0;
									
										
										$count =count($_SESSION["cart"]);
										for($i=0;$i<$count;$i++)
										{
									?>
                                        <tr class="cart_item">
                                            <td class="product-remove">
  <a title="Remove this item" class="remove" href="removecart.php?index=<?php echo $i?>">×</a> 
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="<?php echo "admin/img/".$_SESSION["cart"][$i]["Image"]?>"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="single-product.html"><?php echo $_SESSION["cart"][$i]["Name"]?></a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount"><?php echo $_SESSION["cart"][$i]["Price"]?></span> 
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    
                      <input type="number" size="4" class="input-text qty text" title="Qty" value="<?php echo $_SESSION["cart"][$i]["Quantity"]?>" min="0" step="1">
                                                    
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
    <span class="amount">Rs. <?php echo $_SESSION["cart"][$i]["Price"] * $_SESSION["cart"][$i]["Quantity"] ?></span> 
                                            </td>
                                        </tr>
                                        
                                     
                                        
                                        
                                          <?php
				 @$subtotal += $_SESSION["cart"][$i]["Price"] * $_SESSION["cart"][$i]["Quantity"];
				 
				 $tax= $subtotal*20/100;
				
				
				
										}
									}
										?>
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <a href="index.php" class="btn btn-warning">Continue Shopping</a>
                                          
                                                <input type="submit" value="Checkout" name="proceed" class="checkout-button button alt wc-forward">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>

                            <div class="cart-collaterals">


                            


                            <div class="cart_totals ">
                                <h2>Cart Totals</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">Rs. <?php echo $subtotal ?></span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Tax</th>
                                            <td>Rs. <?php echo $tax?></td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">Rs. <?php echo $subtotal + $tax?></span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            


                            </div>
                        </div>                        
                    </div>                    
                </div>
                <?php
                }
				else
				{
				?>
                <div><h1 class="text-info">Your Cart is Empty</h1></div>
				<?php	
				}
				?>
            </div>
        </div>
    </div>









<?php include("footer.php"); ?>
