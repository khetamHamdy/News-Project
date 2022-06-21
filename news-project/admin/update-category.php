<?php
include "header.php";
include '../config.php';

//get id in url link a href and sava value in variable  $id_update
$id_update = $_GET['update'];
//echo $id_update;
if (isset($_POST['submit_update'])) 
{
    $cat_name = $_POST['cat_name'];
    
    $sql = "update category set CATEGORYNAME='$cat_name' where category_id ='$id_update'";
    //echo $cat_name;
    
    $query = mysqli_query($conn, $sql) or die("query failed ");
    if ($query) {
        // echo 'succusfully update';
        header('location:category.php');
    }
} ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="adin-heading"> Update Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">

                <?php
        
            
            $selectUpdate=mysqli_query($conn , "select * from `category` where category_id = '$id_update'") or die('query failed');
            if (mysqli_num_rows($selectUpdate) > 0 ) {
                while ($fetch_update= mysqli_fetch_assoc($selectUpdate)){
        ?>
                <form action="" method="POST">

                    <div class="form-group">
                        <input type="hidden" name="cat_id" class="form-control" value="1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input value="<?php echo $fetch_update['CATEGORYNAME'];?>" type="text" name="cat_name"
                            class="form-control" placeholder="" required>
                    </div>
                    <input type="submit" name="submit_update" class="btn btn-primary" value="Update" required />
                </form>
                <?php
                }
            }
        else{
            echo 'not data updated';

        } 
        ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>