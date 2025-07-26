<?php
include("config.php");

// ✅ Fetch product data by ID
if(!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('Invalid Product ID'); window.location.href='showproduct.php';</script>";
    exit;
}
$id = $_GET['id'];
$result = mysqli_query($connect, "SELECT * FROM producttable WHERE pro_id='$id'");
$product = mysqli_fetch_assoc($result);

if(!$product) {
    echo "<script>alert('Product not found'); window.location.href='showproduct.php';</script>";
    exit;
}

// ✅ Update product if form submitted
if(isset($_POST['update_product'])) {
    $name  = $_POST['p_name'];
    $desc  = $_POST['p_des'];
    $price = $_POST['p_price'];
    $cat   = $_POST['cat_fk'];
    $oldImage = $_POST['old_image'];

    $newImage = $_FILES['p_image']['name'];
    $tmpName  = $_FILES['p_image']['tmp_name'];

    if($newImage != "") {
        $ext = strtolower(pathinfo($newImage, PATHINFO_EXTENSION));
        $allowed = ["jpg","jpeg","png"];
        if(in_array($ext, $allowed)) {
            move_uploaded_file($tmpName, "img/".$newImage);
            if(file_exists("img/".$oldImage)) unlink("img/".$oldImage);
            $finalImage = $newImage;
        } else {
            echo "<script>alert('Only JPG and PNG images are allowed');</script>";
            $finalImage = $oldImage;
        }
    } else {
        $finalImage = $oldImage;
    }

    $query = "UPDATE producttable 
              SET pro_name='$name', pro_des='$desc', pro_price='$price', pro_image='$finalImage', cat_id_fk='$cat' 
              WHERE pro_id='$id'";
    if(mysqli_query($connect, $query)) {
        echo "<script>alert('✅ Product Updated Successfully'); window.location.href='showproduct.php';</script>";
    } else {
        echo "<script>alert('❌ Failed to Update Product');</script>";
    }
}

include("header.php");
?>

<section id="main-content">
<section class="wrapper">
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-edit"></i> Edit Product</h3>
    </div>
</div>

<div class="row">
<div class="col-lg-8">
<section class="panel">
<div class="panel-body">

<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="old_image" value="<?php echo $product['pro_image']; ?>">

    <div class="form-group">
        <label>Product Name</label>
        <input type="text" name="p_name" class="form-control" value="<?php echo $product['pro_name']; ?>" required>
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea name="p_des" class="form-control" rows="5" required><?php echo $product['pro_des']; ?></textarea>
    </div>

    <div class="form-group">
        <label>Price</label>
        <input type="text" name="p_price" class="form-control" value="<?php echo $product['pro_price']; ?>" required>
    </div>

    <div class="form-group">
        <label>Current Image</label><br>
        <img src="img/<?php echo $product['pro_image']; ?>" width="120"><br><br>
        <input type="file" name="p_image" class="form-control" accept=".jpg,.jpeg,.png">
    </div>

    <div class="form-group">
        <label>Select Category</label>
        <select name="cat_fk" class="form-control" required>
            <?php
            $catQuery = mysqli_query($connect, "SELECT * FROM categorytable");
            while($c = mysqli_fetch_assoc($catQuery)) {
                $selected = ($c['cat_id'] == $product['cat_id_fk']) ? "selected" : "";
                echo "<option value='{$c['cat_id']}' $selected>{$c['cat_name']}</option>";
            }
            ?>
        </select>
    </div>

    <button type="submit" name="update_product" class="btn btn-success">Update Product</button>
    <a href="showproduct.php" class="btn btn-secondary">Cancel</a>
</form>

</div>
</section>
</div>
</div>
</section>
</section>

<?php include("footer.php"); ?>
