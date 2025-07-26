<?php
include("header.php");
include("slider.php");
?>

    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">All Products</h2>
                        <div class="product-carousel">
                        <?php
						include("admin/config.php");
						$exe = mysqli_query($connect,"select * from producttable");
						while($row = mysqli_fetch_array($exe))
						{
						?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo "admin/img/".$row["pro_image"] ?>" alt="">
                                    <div class="product-hover">
           
             <a href="single-product.php?id=<?php echo $row["pro_id"]?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                
                                <h2><a href="single-product.html"></a><?php echo $row["pro_name"]?></a></h2>
                                
                                <div class="product-carousel-price">
                                    <ins>Rs <?php echo $row["pro_price"]?></ins> 
                                </div> 
                            </div>
                            
                      <?php
						}

						?>
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
     
    
 
    
    <?php
include("footer.php");

?>