<?php
include "header.php";
include '../config.php';
$id_update = $_GET['edit'];

if (isset($_POST['submit'])) {
    $post_title = $_POST['post_title'];
    $postdesc = $_POST['postdesc'];
    $category = $_POST['category'];
    $image = $_FILES['new-image']['name'];
    
    $filename = $_FILES["new-image"]["name"];
    // var_dump($filename);
    $tempname = $_FILES["new-image"]["tmp_name"];
    $folder = "../image/" . $filename;
    
    $sql = "update posts set title=' $post_title' , descerption='$postdesc' , 
    id_category ='$category' , image='$filename' where id='$id_update'";
    $query=  mysqli_query($conn, $sql) or die("query failed".mysqli_error($conn));
    if($query){
        header('location:post.php');
    }
    if (move_uploaded_file($tempname, $folder)) {
                $msg = "Image uploaded successfully";
                //echo $msg;
            } else {
                $msg = "Failed to upload image";
            }
    }
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Update Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form for show edit-->
                <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <?php
                    $sql = "select * from posts where id = '$id_update'";
                    $query = mysqli_query($conn, $sql);
                    $fetch = mysqli_fetch_assoc($query);
                    ?>
                    <div class="form-group">
                        <input type="hidden" name="post_id" class="form-control" value="1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTile">Title</label>
                        <input type="text" name="post_title" class="form-control" id="exampleInputUsername"
                            value="<?php echo $fetch['title'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="postdesc" class="form-control" required rows="5">
                        <?php echo $fetch['descerption'] ?>
                </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCategory">Category</label>
                        <select class="form-control" name="category">
                            <?php $sql_query = mysqli_query($conn , "SELECT * FROM `posts` JOIN `category` WHERE posts.id_category = category.category_id ;") ;
                        while ($fetchCat = mysqli_fetch_assoc($sql_query)) {
                            ?>
                            <option value="<?php echo $fetchCat['id_category']?>">
                                <?php echo $fetchCat['CATEGORYNAME']?>
                            </option>
                            <?php
                        }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Post image <br><span> image name : <?php echo $fetch['image']?></span></label>
                        <input type="file" name="new-image">
                        <img src="../image/<?php echo $fetch['image']?>" height="150px">
                        <input type="hidden" name="old-image" value="">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" />
                </form>
                <!-- Form End -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>