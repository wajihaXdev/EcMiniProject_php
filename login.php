<?PHP
include 'header.php';
include("admin/config.php");

session_start();
?>

<?PHP
if(isset($_POST['login'])){
    $useremail = $_POST['em'];
    $userpass = $_POST['pw'];

    $query = "SELECT * FROM `registration` where email = '$useremail'";
    $val = mysqli_query($connect,$query);

    while($data = mysqli_fetch_assoc($val)){
        if($useremail == $data['email'] && $userpass == $data['password'] && $data['user_role'] == 'admin'){
            $_SESSION['admin_name'] = $data['name'];
            header('location: admin/dashboard.php');
        }elseif($useremail == $data['email'] && $userpass == $data['password'] && $data['user_role'] == 'user'){
            $_SESSION['user_name'] = $data['name'];
            header('location: index.php');
        }
    }
}
?>
<!-- <a href="admin/dashboard.php"></a> -->
    <div class="container">
        <form action="" method="POST">
            <div>
                <label for="">Email</label>
                <input type="email" class="form-control" name="em" id="">
            </div>
            <div>
                <label for="">Password</label>
                <input type="password" class="form-control" name="pw" id="">
            </div>
            <input type="submit" name="login">
            <a href="register.php">Not have an account? register!</a>

        </form>
    </div>
    
    
    <?php
include("footer.php");

?>