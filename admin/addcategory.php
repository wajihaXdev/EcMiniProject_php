<?php
include("header.php");
?>


 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Add Categroy</h3>
					
				</div>
			</div>
            <?php
			include("config.php");
			if(isset($_POST["btnadd"]))	
			{
				$c_name=$_POST["catname"];
				
				$query = "insert into categorytable (cat_name) values ('".$c_name."')";
				$exe = mysqli_query($connect,$query);
				if($exe)
				{
					//header("Location:showcategory.php");
					$message = "Record Inserted";
				}
				else
				{
					$message = mysqli_error($connect);
					
				}
			}
			?>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Add
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal " method="post">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Category Name</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="catname">
                                      </div>
                                  </div>
                                <input type="submit" name="btnadd" value="Add Category" class="btn btn-lg btn-success"/>
                                <p><?php echo  @$message; ?></p>
                              </form>
                          </div>
                      </section>
                     
                  </div>
              </div>
             
          </section>
      </section>
      <!--main content end-->



<?php

include("footer.php");
?>