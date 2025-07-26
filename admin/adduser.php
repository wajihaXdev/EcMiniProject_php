<?php
include("header.php");
?>

<?PHP
if(isset($_POST['register'])){
$name = $_POST['nm'];
$email = $_POST['em'];
$pass = $_POST['pw'];
$role = $_POST['role'];

$query = "INSERT INTO `registration`(`name`, `email`, `password`, `user_role`) VALUES ('$name','$email','$pass','$role')";

$val = mysqli_query($connect,$query);

if($val){
header('location: showuser.php');
}
}
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
                          <div class="container">
        <form action="" method="POST">
            <div>
                <label for="">Name</label>
                <input type="text" class="form-control" name="nm" id="">
            </div>
            <div>
                <label for="">Email</label>
                <input type="email" class="form-control" name="em" id="">
            </div>
            <div>
                <label for="">Password</label>
                <input type="password" class="form-control" name="pw" id="">
            </div>
            <div>
                <label for="">Select role:</label>
                <select name="role" id="">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <input type="submit" name="register">
            <a href="login.php">Already have an account?</a>
        </form>
    </div>

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