<?php
include "header.php";
include '../config.php';
$id_update = $_GET['update'];

if (isset($_POST['submit'])) {
    $fullName = $_POST['f_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $sql = "update users set fullname='$fullName' , username='$username' , email='$email' where id='$id_update'";
    mysqli_query($conn, $sql);
    header('location:users.php');
}

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Modify User Details</h1>
            </div>
            <div class="col-md-offset-4 col-md-4">
                <!-- Form Start -->
                <?php
$sql = "select * from users where id = '$id_update'";
$query = mysqli_query($conn, $sql);
$fetch = mysqli_fetch_assoc($query);
?>
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="user_id" class="form-control" value="1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>full Name</label>
                        <input type="text" name="f_name" class="form-control" value="<?php echo $fetch['fullname'] ?>"
                            placeholder="" required>
                    </div>

                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $fetch['username'] ?>"
                            placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $fetch['email'] ?>"
                            placeholder="" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                </form>
                <!-- /Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php";?>