<?php
include 'header.php';
include("admin/config.php");
?>

<?php
if(isset($_POST['register'])){
    $name  = $_POST['nm'];
    $email = $_POST['em'];
    $pass  = $_POST['pw'];
    $role  = "user"; // ✅ Default role set to user

    $query = "INSERT INTO `registration`(`name`, `email`, `password`, `user_role`) 
              VALUES ('$name','$email','$pass','$role')";
    $val = mysqli_query($connect,$query);

    if($val){
        header('location: login.php');
        exit;
    } else {
        echo "<div class='alert alert-danger text-center'>Registration Failed!</div>";
    }
}
?>

<div class="container">
    <h2 class="mt-3">User Registration</h2>
    <form action="" method="POST" class="p-3 border rounded">
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="nm" required>
        </div>
        <div class="mb-3">
            <label for="">Email</label>
            <input type="email" class="form-control" name="em" required>
        </div>
        <div class="mb-3">
            <label for="">Password</label>
            <input type="password" class="form-control" name="pw" required>
        </div>
        <!-- ✅ Role field removed -->
        <button type="submit" name="register" class="btn btn-primary">Register</button>
        <a href="login.php" class="btn btn-link">Already have an account?</a>
    </form>
</div>

<?php include("footer.php"); ?>
