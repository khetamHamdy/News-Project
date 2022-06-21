<?php
include 'header.php';
include 'config.php';
$id = $_GET['id'];
$query="SELECT * FROM `posts`  JOIN `category`  ON  posts.id_category =category.category_id where posts.id ='$id'";
$sql = mysqli_query($conn, $query);
?>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <?php
while ($fetch = mysqli_fetch_assoc($sql)) {
    ?>
                <div class="post-container">
                    <div class="post-content single-post">
                        <h3><?php echo $fetch['title']?></h3>
                        <div class="post-information">
                            <span>
                                <i class="fa fa-tags" aria-hidden="true"></i>
                                <?php echo $fetch['CATEGORYNAME']?>
                            </span>
                            <span>
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <a
                                    href='author.php?author=<?php echo $fetch['id'] ;?>'><?php echo $fetch['author']?></a>
                            </span>
                            <span>
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <?php echo $fetch['date']?>
                            </span>
                        </div>
                        <img class="single-feature-image" src="image/<?php echo $fetch['image']?>" alt="" />
                        <p class="description">
                            <?php echo $fetch['descerption']?>
                        </p>
                    </div>
                </div>
                <?php }?>
                <!-- /post-container -->
            </div>
            <?php include 'sidebar.php';?>
        </div>
    </div>
</div>
<?php include 'footer.php';?>