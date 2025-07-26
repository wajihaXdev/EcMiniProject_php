<?php
include("header.php");
?>
<section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-table"></i> Show Banner</h3>
					
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-sm-12">
                      <section class="panel">
                          <header class="panel-heading">
                              All Banner
                          </header>
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Banner Image</th>
                                 
                              </tr>
                              </thead>
                              <tbody>
                              <?php
							  include("config.php");
							  $query = "select * from  bannertable";
							  $execute = mysqli_query($connect,$query);
							  while($row=mysqli_fetch_array($execute))
							  {
							  ?>
                              <tr>
                                  <td><?php echo $row["ban_id"]?></td>
                                 <td><img src="<?php echo "img/".$row["ban_image"]?>" width="700px" height="200px"/></td>
                               
                              </tr>
                            <?php
							
							  }
							  
							  
							  ?>
                            
                              </tbody>
                          </table>
                      </section>
                  </div>
                 
              </div>
           
          </section>
      </section>


<?php

include("footer.php");
?>