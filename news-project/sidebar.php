<?php
if (isset($_POST['submit'])) {
    $search_item = $_POST['search'];

    $select_news = mysqli_query(
        $conn,
        " SELECT * FROM `posts`  JOIN `category`  ON  posts.id_category =category.category_id
                where
                title like '%{$search_item}%' or
                descerption like '%{$search_item}%' or
                date like '%{$search_item}%' or
                author like '%{$search_item}%'  "
    )
    or die("query failed");
    // if ($select_news) {
    //     echo "susscfully";
    // }
}
?>
<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method="POST">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <input type="submit" name="submit" value="Search" class="btn btn-danger">

                </span>
            </div>
        </form>

    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        <?php
$query = "SELECT * FROM `posts` JOIN `category` ON posts.id_category =category.category_id  ORDER BY posts.id DESC LIMIT 4;
                ";
$sql = mysqli_query($conn, $query) or die("query failed");
while ($fetch = mysqli_fetch_assoc($sql)) {
    ?>
        <div class="recent-post">
            <a class="post-img" href="">
                <img src="../image/<?php echo $fetch['image']; ?>" alt="" />
            </a>
            <div class="post-content">
                <h5><a href="#"><?php echo $fetch['title']; ?></a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href="single.php?id=<?php echo $fetch['id']; ?>"><?php echo $fetch['CATEGORYNAME']; ?></a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo $fetch['date']; ?>
                </span>
                <a class="read-more" href="single.php?id=<?php echo $fetch['id']; ?>">read more</a>
            </div>
        </div>
        <?php
}?>
    </div>
    <!-- /recent posts box -->
</div>