<?php
include("header.php");
include("config.php"); // ✅ Correct path for DB connection

// ✅ Delete logic
if(isset($_POST['delete_id'])){
    $delete_id = intval($_POST['delete_id']);
    $query = "DELETE FROM registration WHERE id='$delete_id'";
    if(mysqli_query($connect, $query)){
        $message = "<div class='alert alert-success text-center'>✅ User deleted successfully!</div>";
    } else {
        $message = "<div class='alert alert-danger text-center'>❌ Error deleting user: ".mysqli_error($connect)."</div>";
    }
}
?>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-users"></i> Registered Users</h3>
            </div>
        </div>

        <!-- ✅ Update success message -->
        <?php if(isset($_GET['msg']) && $_GET['msg'] == 'updated'){ ?>
            <div class="alert alert-info text-center">✅ User updated successfully!</div>
        <?php } ?>

        <!-- ✅ Delete success/error message -->
        <?php if(isset($message)) echo $message; ?>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Users List</header>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>User Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM registration ORDER BY id DESC";
                                    $result = mysqli_query($connect, $query);
                                    $count = 1;

                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo "<tr>
                                                    <td>".$count++."</td>
                                                    <td>".$row['name']."</td>
                                                    <td>".$row['email']."</td>
                                                    <td>".$row['password']."</td>
                                                    <td>".ucfirst($row['user_role'])."</td>
                                                    <td>
                                                        <a href='edituser.php?id=".$row['id']."' class='btn btn-warning btn-sm'>Edit</a>
                                                        <form method='POST' style='display:inline-block;' onsubmit=\"return confirm('Are you sure you want to delete this user?');\">
                                                            <input type='hidden' name='delete_id' value='".$row['id']."'>
                                                            <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                                                        </form>
                                                    </td>
                                                  </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5' class='text-center text-danger'>No Users Found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>

<?php include("footer.php"); ?>
