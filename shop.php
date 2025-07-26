<?php
include("header.php");
?>
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
            <?php
			include("admin/config.php");
			if(isset($_GET["c_id"]))
			{
				$cat_id =$_GET["c_id"]; 
				
				$query="select * from producttable where cat_id_fk  = '".$cat_id."'";
				$exe = mysqli_query($connect,$query);
				$row_count =mysqli_num_rows($exe);
				if($row_count > 0)
				{
					while($row = mysqli_fetch_array($exe))
					{	
					
			?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="<?php echo "admin/img/".$row["pro_image"]?>" alt="">
                        </div>
                        <h2><a href=""><?php echo $row["pro_name"]?></a></h2>
                        <div class="product-carousel-price">
                            <ins>Rs. <?php echo $row["pro_price"]?></del>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="single-product.php?id=<?php echo $row["pro_id"]?>">See details</a>
                        </div>                       
                    </div>
                </div>
            <?php
				
					}
				}
				else
				{
					$message = "No Product Available";
				}
			}
			else
			{
				echo "<script> window.location.href='index.php'</script>";
				
			}
			?>
            <h1><?php echo @$message ;?></h1>
            </div>
            
            
        </div>
    </div>




    
 <?php
include("footer.php");

?>