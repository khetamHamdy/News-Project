<?php
include "header.php";
include '../config.php';
if (isset($_POST['submit'])) {
    $title = $_POST['post_title'];
    $Description = $_POST['Description'];
    $category = $_POST['categoryid'];
    $author = $_POST['post_author'];
    $date = date('Y-m-d H:i:s');

    $filename = $_FILES["fileToUpload"]["name"];
    // var_dump($filename);
    $tempname = $_FILES["fileToUpload"]["tmp_name"];
    $folder = "../image/" . $filename;

    $sql = "INSERT INTO posts (title,descerption , id_category ,image ,date,author)
        VALUES ('$title' , '$Description','$category','$filename','$date' ,'$author')";
    $queryselector = mysqli_query($conn, $sql) or die("query failed" . mysqli_error($conn));
    if (move_uploaded_file($tempname, $folder)) {
//$msg = "Image uploaded successfully";
        header('location:post.php');
    } else {
        $msg = "Failed to upload image";
    }

}

?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="post_title">Title</label>
                        <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="post_title">Name author</label>
                        <input type="text" name="post_author" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="Description" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                        <select name="categoryid" class="form-control">
                            <?php
                                $query = "SELECT * FROM `category` ";

                                $querysql = mysqli_query($conn, $query);
                                while ($fetch = mysqli_fetch_assoc($querysql)) {
                                    ?>

                            <option value="<?php echo $fetch['category_id'] ?>" selected>
                                <?php echo $fetch['CATEGORYNAME'] ?>
                            </option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Post image</label>
                        <input type="file" name="fileToUpload" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php";?>