<?php include("header.php");?>


<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                
                
                <div class="col-md-12">
                    <div class="product-content-right">
                        <?php
						
						include("admin/config.php");
						if(isset($_GET["id"]))
						{
							$productid=$_GET["id"];
							$query="select * from producttable where pro_id = '".$productid."'";
							$exe=mysqli_query($connect,$query);
							if(mysqli_num_rows($exe)>0)
							{
							$row=mysqli_fetch_array($exe);
						
						?>
                        
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="<?php echo "admin/img/".$row["pro_image"] ?>" alt="">
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo $row["pro_name"]?></h2>
                                    <div class="product-inner-price">
                                        <ins>Rs. <?php echo $row["pro_price"]?></ins>
                                    </div>    
                                    
                                    <form action="cart.php" class="cart" method="post">
                                        <div class="quantity">
                                        <input name="hide_id" value="<?php echo $row["pro_id"]?>" type="hidden"/>
                                        <input name="hide_name" value="<?php echo $row["pro_name"]?>" type="hidden"/>
                                         <input name="hide_image" value="<?php echo $row["pro_image"]?>" type="hidden"/>
                                         <input name="hide_price" value="<?php echo $row["pro_price"]?>" type="hidden"/>
          <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="submit" name="btncart">Add to cart</button>
                                    </form>   
                                    
                                   
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>  
                                                <p><?php echo $row["pro_des"]?></p>

                                                                        </div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        <?php
						}
						}
						else
						{
						echo "<script>window.location.href='index.php'</script>";	
						}
						?>
                    </div>                    
                </div>
            </div>
        </div>
    </div>






















<?php include("footer.php"); ?>