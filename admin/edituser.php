<?php
ob_start(); // ✅ Ensures no output sent before redirect
include("header.php");
include("config.php");

if(!isset($_GET['id'])){
    header("Location: showuser.php");
    exit;
}

$id = intval($_GET['id']);

$query = "SELECT * FROM registration WHERE id='$id'";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) == 0){
    header("Location: showuser.php");
    exit;
}

$user = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $name  = $_POST['nm'];
    $email = $_POST['em'];
    $pass  = $_POST['pw'];

    $update_query = "UPDATE registration SET name='$name', email='$email', password='$pass' WHERE id='$id'";
    if(mysqli_query($connect, $update_query)){
        header("Location: showuser.php?msg=updated");
        exit;
    } else {
        $error = "<div class='alert alert-danger text-center'>❌ Error updating user: ".mysqli_error($connect)."</div>";
    }
}
?>


<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-edit"></i> Edit User</h3>
            </div>
        </div>

        <?php if(isset($error)) echo $error; ?>

        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <section class="panel">
                    <header class="panel-heading">Update User Information</header>
                    <div class="panel-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="nm" value="<?php echo $user['name']; ?>" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="em" value="<?php echo $user['email']; ?>" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="text" name="pw" value="<?php echo $user['password']; ?>" class="form-control" required>
                            </div>
                            <button type="submit" name="update" class="btn btn-primary">Update User</button>
                            <a href="showuser.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>

<?php include("footer.php"); ?>
<?php ob_end_flush(); ?>
