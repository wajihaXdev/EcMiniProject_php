<?php
include("header.php");
?>
<!------------------------Show Category start---------------------->

    <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-table"></i> Show Category</h3>
					
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-sm-12">
                      <section class="panel">
                          <header class="panel-heading">
                              All Categrory
                          </header>
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Catgeory Name</th>
                                 
                              </tr>
                              </thead>
                              <tbody>
                              <?php
							  include("config.php");
							  $query = "select * from categorytable";
							  $execute = mysqli_query($connect,$query);
							  while($row=mysqli_fetch_array($execute))
							  {
							  ?>
                              <tr>
                                  <td><?php echo $row["cat_id"]?></td>
                                 <td><?php echo $row["cat_name"]?></td>
                                  
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















<!------------------------Show Category end---------------------->

<?php
include("footer.php");
?>