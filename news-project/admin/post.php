<?php 
include "header.php";
include '../config.php';
// get id in session 
$admain_id=$_SESSION['id'];
// if user not login :  Redircte in login.php
if (! isset($admain_id)) {
    header('location:login.php');
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "delete from posts  where id ='$id'";
    mysqli_query($conn, $sql);
    header('location:post.php');
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Posts</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-post.php">add post</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>descerption</th>
                        <th>Category Name</th>
                        <th>Date</th>

                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                            $query="SELECT * FROM `posts`  JOIN `category`  ON  posts.id_category =category.category_id ";

                            $query = mysqli_query($conn, $query);
                            $counter = 1;
                            while ($fetch = mysqli_fetch_assoc($query)) {
                                ?>
                        <tr>
                            <td class='id'><?php echo $counter; ?></td>
                            <td><?php echo $fetch['title']; ?></td>
                            <td><?php echo $fetch['descerption']; ?></td>
                            <td><?php echo $fetch['CATEGORYNAME']; ?></td>
                            <td><?php echo $fetch['date']; ?></td>

                            <td class='edit'><a href='update-post.php?edit=<?php echo $fetch['id']; ?>'><i
                                        class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='post.php?delete=<?php echo $fetch['id'] ?>'
                                    onclick="return confirm('Delete This category ?')"><i class='fa fa-trash-o'></i></a>
                            </td>
                        </tr>
                        <?php $counter++;}?>

                    </tbody>
                </table>
                <ul class='pagination admin-pagination'>
                    <li class="active"><a>1</a></li>
                    <li><a>2</a></li>
                    <li><a>3</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php";?>