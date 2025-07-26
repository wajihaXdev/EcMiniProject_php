<div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
                <?php
				include("admin/config.php");
				$query= "select * from bannertable";
				$res=mysqli_query($connect,$query);
				while($row = mysqli_fetch_array($res))
				{
				?>
					<li>
						<img src="<?php echo "admin/img/".$row["ban_image"]?>" alt="Slide">
						
					</li>
				<?php
				}
				?>	
				</ul>
			</div>
			<!-- ./Slider -->
    </div>