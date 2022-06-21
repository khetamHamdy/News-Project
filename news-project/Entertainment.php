<?php 
include 'header.php'; 
include 'config.php';
$query="SELECT * FROM `posts`  JOIN `category`  ON  posts.id_category =category.category_id where category.CATEGORYNAME ='Entertainment'";
$sql =mysqli_query($conn, $query);
?>
<div id="main-content">
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                    <h2 class="page-heading">Category Name : Entertainment</h2>
                    <?php 
                        while ($fetch = mysqli_fetch_assoc($sql)) {                
                    ?>
                    <div class="post-content">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="post-img" href="single.php"><img src="image/<?php echo $fetch['image']?>"
                                        alt="" /></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href='single.php'><?php echo $fetch['title']?></a>
                                    </h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href="single.php?id=<?php echo $fetch['id'] ;?>">
                                                <?php echo $fetch['CATEGORYNAME']?>
                                            </a>
                                        </span>
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a
                                                href='author.php?id=<?php echo $fetch['author'] ;?>'><?php echo $fetch['author']?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <?php echo $fetch['date']?>
                                        </span>
                                    </div>
                                    <p class="description">
                                        <?php echo $fetch['descerption']?>
                                    </p>
                                    <a class="read-more" href="single.php?id=<?php echo $fetch['id'] ;?>">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <ul class='pagination'>
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                    </ul>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php';?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>