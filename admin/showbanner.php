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
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Banner Image</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include("config.php");
                $query = "SELECT * FROM bannertable";
                $execute = mysqli_query($connect, $query);
                while($row = mysqli_fetch_array($execute)) {
                ?>
                <tr>
                    <td><?php echo $row["ban_id"]; ?></td>
                    <td><img src="<?php echo "img/".$row["ban_image"]; ?>" width="200" height="100"/></td>
                    <td>
                        <a href="editbanner.php?id=<?php echo $row['ban_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="deletebanner.php?id=<?php echo $row['ban_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this banner?');">Delete</a>
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
