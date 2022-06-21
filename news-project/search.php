<?php 
include 'header.php';
include 'config.php';
?>
<div id="main-content">
    <div class="container">
        <div class="row">

            <?php include 'sidebar.php';?>
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">

                    <h2 class="page-heading">Search :
                        <?php echo $search_item;?>
                    </h2>
                    <?php 
                    if (mysqli_num_rows($select_news)>0) {
                        while ($fetch = mysqli_fetch_assoc($select_news)) {        
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
                                            <a href='#'>
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
                    <?php
                            }
                        }else{
                            ?>
                    <div class="post-content">
                        <div class="row">

                            <h4 style="color:#0064ef ;">Search results are not available, search again</h4>

                        </div>
                    </div>
                    <?php }?> <ul class='pagination'>
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                    </ul>
                </div><!-- /post-container -->
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>