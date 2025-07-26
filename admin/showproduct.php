<?php
include("header.php");
?>




<section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-table"></i> Show Product</h3>
					
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-sm-12">
                      <section class="panel">
                          <header class="panel-heading">
                              All Products
                          </header>
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                   <th>Description</th>
                                    <th>Price</th>
                                     <th>Image</th>
                                      <th>Category Id</th>
                                 
                              </tr>
                              </thead>
                              <tbody>
                              <?php
							  include("config.php");
							  $query = "select p.pro_id,p.pro_name,p.pro_des,p.pro_price,p.pro_image,c.cat_name  from producttable as p  inner join  categorytable as c on c.cat_id = p.cat_id_fk;";
							  $execute = mysqli_query($connect,$query);
							  while($row=mysqli_fetch_array($execute))
							  {
							  ?>
                              <tr>
                                  <td><?php echo $row["pro_id"]?></td>
                                 <td><?php echo $row["pro_name"]?></td>
                                 <td><?php echo $row["pro_des"]?></td>
                                 <td><?php echo $row["pro_price"]?></td>
                                 <td><img src="<?php echo "img/".$row["pro_image"]?>" width="100" height="100"/> </td>
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













 <?php
	   include("footer.php");
	   ?>