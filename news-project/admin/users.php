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

    $sql = "DELETE FROM users where id ='$id'";
    $query = mysqli_query($conn, $sql);
    header('location:users.php');
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Users</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-user.php">add user</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
$query = "select * from users";
$query_selector = mysqli_query($conn, $query);
if (mysqli_num_rows($query_selector) > 0) {
    while ($fetch = mysqli_fetch_assoc($query_selector)) {

        ?>
                        <tr>
                            <td class='id'><?php echo $fetch['id'] ?></td>
                            <td><?php echo $fetch['fullname'] ?></td>
                            <td><?php echo $fetch['username'] ?></td>
                            <td><?php echo $fetch['email'] ?></td>
                            <td class='edit'><a href='update-user.php?update=<?php echo $fetch['id'] ?>'><i
                                        class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='users.php?delete=<?php echo $fetch['id'] ?>'
                                    onclick="return confirm('Delete This users ?')"><i class='fa fa-trash-o'></i></a>
                            </td>
                        </tr>
                        <?php
}
}
?>
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
<?php include "header.php";?>