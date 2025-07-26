<?php
include("config.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($connect, "SELECT * FROM bannertable WHERE ban_id='$id'");
    $data = mysqli_fetch_assoc($result);
}

if(isset($_POST['update'])) {
    $oldImage = $_POST['old_image'];
    $newImage = $_FILES['bannername']['name'];
    $tmpName = $_FILES['bannername']['tmp_name'];

    if($newImage != "") {
        $file_ext = strtolower(pathinfo($newImage, PATHINFO_EXTENSION));
        $allowed = array("jpg","jpeg","png");

        if(in_array($file_ext, $allowed)) {
            move_uploaded_file($tmpName, "img/".$newImage);
            if(file_exists("img/".$oldImage)) unlink("img/".$oldImage);
            $update = "UPDATE bannertable SET ban_image='$newImage' WHERE ban_id='$id'";
        } else {
            echo "Only JPG and PNG files allowed";
            exit;
        }
    } else {
        $update = "UPDATE bannertable SET ban_image='$oldImage' WHERE ban_id='$id'";
    }

    if(mysqli_query($connect, $update)) {
        header("Location: showbanner.php");
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>

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

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">All Banners</header>
            <form method="post" enctype="multipart/form-data">
    <p>Current Banner:</p>
    <img src="img/<?php echo $data['ban_image']; ?>" width="200"><br><br>
    <input class="form-control" type="hidden" name="old_image" value="<?php echo $data['ban_image']; ?>">
    <label>Upload New Image:</label>
    <input type="file" name="bannername"><br><br>
    <input type="submit" name="update" class="btn btn-primary btn-sm" value="Update Banner">
</form>
        </section>
    </div>
</div>
</section>
</section>


<?php include("footer.php"); ?>

