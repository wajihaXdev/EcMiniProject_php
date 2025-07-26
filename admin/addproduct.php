<?php
include("header.php");
?>


<section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Add Product</h3>
					
				</div>
			</div>
      <?php
	   include("config.php");
	  if(isset($_POST["btnaddpro"]))
	  {
		  $proname =$_POST["p_name"];
		  $prodes =$_POST["p_des"];
		  $proprice =$_POST["p_price"];
		  $proimg =$_FILES["p_image"]["name"];
		  $temp_loc =$_FILES["p_image"]["tmp_name"];
		  $cat_id=$_POST["cat_fk"];
		  
		  if(move_uploaded_file($temp_loc,"img/".$proimg))
		  {
			 $ins_query= "insert into producttable (pro_name,pro_des,pro_price,pro_image,cat_id_fk) values ('".$proname."','".$prodes."','".$proprice."','".$proimg."','".$cat_id."')";
			$execute= mysqli_query($connect,$ins_query);
			  if($execute)
			  {
				  $message= "Product inserted";
				  
				}
				else
				{
					 $message= "Product not inserted";
				}
			}
		  
	 }  
	  ?>
      
      
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          
                          <div class="panel-body">
                              <form class="form-horizontal " method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Product Name</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="p_name">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Product Description</label>
                                      <div class="col-sm-10">
                                      <textarea class="form-control" name="p_des" rows="5"></textarea>
                                          
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Product Price</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="p_price">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Product Image</label>
                                      <div class="col-sm-10">
                                          <input type="file" class="form-control" name="p_image">
                                      </div>
                                  </div>
                                  
                                   <div class="form-group">
                                      <label class="col-sm-2 control-label">Select Category</label>
                                      <div class="col-sm-10">
                                          <select class="form-control" name="cat_fk">
                                          <?php
										  include("config.php");
										  $exe=mysqli_query($connect,"select * from categorytable");
										  while($row=mysqli_fetch_array($exe))
										  {
										  
										  ?>
                                          <option value="<?php echo $row["cat_id"]?>"><?php echo $row["cat_name"]?></option>
                                          <?php
										  
										  }
										  ?>
                                          
                                          </select>
                                      </div>
                                  </div>
                                <input type="submit" name="btnaddpro" value="Add Product" class="btn btn-lg btn-success"/>
                              <p><?php echo @$message ?></p>
                              </form>
                          </div>
                      </section>
                     
                  </div>
              </div>
             
          </section>
      </section>














 <?php
	   include("footer.php");
	   ?>