<?php
include("config.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // get image name to delete from folder
    $getImage = mysqli_query($connect, "SELECT ban_image FROM bannertable WHERE ban_id='$id'");
    $imgData = mysqli_fetch_assoc($getImage);
    $imgPath = "img/" . $imgData['ban_image'];

    // delete from database
    $query = "DELETE FROM bannertable WHERE ban_id='$id'";
    if(mysqli_query($connect, $query)) {
        // delete image file
        if(file_exists($imgPath)) {
            unlink($imgPath);
        }
        header("Location: showbanner.php");
    } else {
        echo "Error deleting record: " . mysqli_error($connect);
    }
}
?>
