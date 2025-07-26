<?php
include("header.php");

session_start();



?>

<section id="main-content">
<section class="wrapper">
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-file-text-o"></i> Add Banner</h3>
    </div>
</div>

<?php
include("config.php");

if(isset($_POST["btnban"])) {    
    $fileban_name = $_FILES["bannername"]["name"];
    $temp_name = $_FILES["bannername"]["tmp_name"];
    $file_ext = strtolower(pathinfo($fileban_name, PATHINFO_EXTENSION));

    // ✅ Allow only PNG and JPG/JPEG
    $allowed_extensions = array("jpg", "jpeg", "png");

    if(in_array($file_ext, $allowed_extensions)) {

        if(move_uploaded_file($temp_name, "img/" . $fileban_name)) {
            $query = "INSERT INTO bannertable (ban_image) VALUES ('".$fileban_name."')";
            $exe = mysqli_query($connect, $query);

            if($exe) {
                $message = "Record Inserted Successfully";
            } else {
                $message = mysqli_error($connect);
            }
        } else {
            $message = "Failed to upload file";
        }
    } else {
        $message = "Only JPG and PNG files are allowed!";
    }
}
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div class="panel-body">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Banner Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="bannername" required>
                        </div>
                    </div>
                    <input type="submit" name="btnban" value="Add Banner" class="btn btn-lg btn-success"/>
                    <p><?php echo @$message; ?></p>
                </form>
            </div>
        </section>
    </div>
</div>

</section>
</section>

<?php include("footer.php"); ?>
