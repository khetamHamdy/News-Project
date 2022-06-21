<?php 
include "header.php";
include '../config.php';

if (isset($_POST['save']))
 {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $name_user = $_POST['user_name'];
    $email = $_POST['email'];    
    $fullName = $fname . $lname;
    //echo $fullName;

    
    $query = "select * from users where fullname='$fullName'";
    $selectorQuery = mysqli_query($conn, $query);

    
    if (mysqli_num_rows($selectorQuery) > 0) 
    {
        $messages[] = "user already exist !";
    }else{
        mysqli_query($conn, "INSERT INTO users(fullname , username , email) 
        VALUES('$fullName' , '$name_user' , '$email') ") or die("query failed");
        header('location:users.php');
    }
}
?>

<div class="messages">
    <?php
    $messages[]='';
    foreach($messages as $mes) {
        echo "<h4>" . $mes . " </h4>";
    }
    ?>
</div>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add User</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <form action="" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="user_name" class="form-control" placeholder="Username" required>
                    </div>

                    <div class="form-group">
                        <label>email</label>
                        <input type="email" name="email" class="form-control" placeholder="email" required>
                    </div>

                    <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                </form>
                <!-- Form End-->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>