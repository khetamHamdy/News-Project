<?php
include '../config.php';


if (isset($_POST['submit'])) {
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    $password= $_POST['password'];
    
    $select_admain=mysqli_query($conn , "select * from admin where 	email='$email' and password='$password' ");
    if(mysqli_num_rows($select_admain)>0){
        $message[] ='user alrady exist';
        $fetch = mysqli_fetch_assoc($select_admain);
        $_SESSION['id']=$fetch['id'];
        $_SESSION['name']=$fetch['name'];
        $_SESSION['email']=$fetch['email'];
        $_SESSION['Address']=$fetch['Address'];
        $_SESSION['password']=$fetch['password'];
        header('location:post.php');
        
    }else{
        $message[]='Incorrect Email Or Password ';
    }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        login
    </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '
                <div class="message">
                    <span>' . $message . '</span>
                    <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                </div>
                ';
        }
    }
    ?>

    <div class="form-container">

        <form action="" method="post">
            <h3>Login Now</h3>
            <input type="email" name="email" placeholder="enter your email" required class="box">
            <input type="password" name="password" placeholder="enter your password" required class="box">
            <input type="submit" name="submit" value="login now" class="btn">
            <p>Don't have an account? <a href="register.php">Register </a></p>
        </form>

    </div>

</body>

</html>