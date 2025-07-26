<?php
include("config.php");

// ✅ Handle Delete Request
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $res = mysqli_query($connect, "SELECT pro_image FROM producttable WHERE pro_id='$id'");
    $data = mysqli_fetch_assoc($res);
    if(file_exists("img/".$data['pro_image'])) unlink("img/".$data['pro_image']);
    mysqli_query($connect, "DELETE FROM producttable WHERE pro_id='$id'");
    echo "<script>alert('❌ Product Deleted'); window.location.href='showproduct.php';</script>";
}

include("header.php");
?>

<section id="main-content">
<section class="wrapper">
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-table"></i> Show Product</h3>
    </div>
</div>

<div class="row">
<div class="col-sm-12">
<section class="panel">
<header class="panel-heading">All Products</header>

<table class="table">
<thead>
<tr>
    <th>#</th>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
    <th>Image</th>
    <th>Category</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
<?php
$query = "SELECT p.pro_id, p.pro_name, p.pro_des, p.pro_price, p.pro_image, c.cat_name 
          FROM producttable p 
          INNER JOIN categorytable c ON c.cat_id = p.cat_id_fk";
$execute = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($execute)) {
?>
<tr>
    <td><?php echo $row["pro_id"]; ?></td>
    <td><?php echo $row["pro_name"]; ?></td>
    <td><?php echo $row["pro_des"]; ?></td>
    <td><?php echo $row["pro_price"]; ?></td>
    <td><img src="img/<?php echo $row["pro_image"]; ?>" width="100" height="100"></td>
    <td><?php echo $row["cat_name"]; ?></td>
    <td>
        <!-- ✅ Edit Redirects to new page -->
        <a href="editproduct.php?id=<?php echo $row['pro_id']; ?>" class="btn btn-warning btn-sm">Edit</a>

        <!-- ✅ Delete works directly -->
        <a href="showproduct.php?delete=<?php echo $row['pro_id']; ?>"
           onclick="return confirm('Are you sure you want to delete this product?');"
           class="btn btn-danger btn-sm">Delete</a>
    </td>
</tr>
<?php } ?>
</tbody>
</table>
</section>
</div>
</div>
</section>
</section>

<?php include("footer.php"); ?>
    