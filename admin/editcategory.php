<?php
include("config.php");

// ✅ Get category by ID
if(!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('Invalid Category ID'); window.location.href='showcategory.php';</script>";
    exit;
}
$id = $_GET['id'];
$result = mysqli_query($connect, "SELECT * FROM categorytable WHERE cat_id='$id'");
$category = mysqli_fetch_assoc($result);

if(!$category) {
    echo "<script>alert('Category Not Found'); window.location.href='showcategory.php';</script>";
    exit;
}

// ✅ Update category
if(isset($_POST['update_category'])) {
    $name = $_POST['cat_name'];
    $query = "UPDATE categorytable SET cat_name='$name' WHERE cat_id='$id'";
    if(mysqli_query($connect, $query)) {
        echo "<script>alert('Category Updated Successfully'); window.location.href='showcategory.php';</script>";
    } else {
        echo "<script>alert('Failed to Update Category');</script>";
    }
}

include("header.php");
?>

<section id="main-content">
<section class="wrapper">
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-edit"></i> Edit Category</h3>
    </div>
</div>

<div class="row">
<div class="col-lg-6">
<section class="panel">
<div class="panel-body">

<form method="post">
    <div class="form-group">
        <label>Category Name</label>
        <input type="text" name="cat_name" class="form-control" value="<?php echo $category['cat_name']; ?>" required>
    </div>
    <button type="submit" name="update_category" class="btn btn-success">Update</button>
    <a href="showcategory.php" class="btn btn-secondary">Cancel</a>
</form>

</div>
</section>
</div>
</div>
</section>
</section>

<?php include("footer.php"); ?>
