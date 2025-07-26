<?php
include("config.php");

// ✅ Handle Delete Request
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($connect, "DELETE FROM categorytable WHERE cat_id='$id'");
    echo "<script>alert('Category Deleted Successfully'); window.location.href='showcategory.php';</script>";
}

include("header.php");
?>

<section id="main-content">
<section class="wrapper">
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-table"></i> Show Category</h3>
    </div>
</div>

<div class="row">
<div class="col-sm-12">
<section class="panel">
<header class="panel-heading">All Categories</header>

<table class="table">
<thead>
<tr>
    <th>#</th>
    <th>Category Name</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
<?php
$query = "SELECT * FROM categorytable";
$execute = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($execute)) {
?>
<tr>
    <td><?php echo $row["cat_id"]; ?></td>
    <td><?php echo $row["cat_name"]; ?></td>
    <td>
        <!-- ✅ Edit Button -->
        <a href="editcategory.php?id=<?php echo $row['cat_id']; ?>" class="btn btn-warning btn-sm">Edit</a>

        <!-- ✅ Delete Button -->
        <a href="showcategory.php?delete=<?php echo $row['cat_id']; ?>" 
           onclick="return confirm('Are you sure you want to delete this category?');" 
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
