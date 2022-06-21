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
    $sql = "delete from category  where category_id  ='$id'";
    mysqli_query($conn, $sql);
    header('location:category.php');
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                        $counter = 1;
                        $query="SELECT * FROM  `category`  ";

                        $selectQury = mysqli_query($conn, $query);
                        while ($fetch = mysqli_fetch_assoc($selectQury)) {

                        ?>
                        <tr>
                            <td class='id'><?php echo $counter; ?></td>
                            <td><?php echo $fetch['CATEGORYNAME']; ?></td>
                        
                            <td class='edit'><a href='update-category.php?update=<?php echo $fetch['category_id'] ?>'><i
                                        class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='category.php?delete=<?php echo $fetch['category_id'] ?>'
                                    onclick="return confirm('Delete This category ?')"><i class='fa fa-trash-o'></i></a>
                            </td>
                        </tr>
                        <?php
                            $counter++;
                        } ?>
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
<?php include "footer.php"; ?>