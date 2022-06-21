<?php

include '../config.php';

if (isset($_POST['submit'])) {
    $name=  mysqli_real_escape_string($conn,$_POST['name']);
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    $address= mysqli_real_escape_string($conn,$_POST['address']);
    $phone_num= mysqli_real_escape_string($conn,$_POST['phonenum']);
    $password= $_POST['password'];
    $passwordc= $_POST['cpassword'];
    $select_admain=mysqli_query($conn , "select * from admin where email ='$email' and password ='$password'");
    if(mysqli_num_rows($select_admain)>0){
        $message[] ='user alrady exist';
        
    }elseif ($password != $passwordc) {
        $message[] ='password dont disMatch';
    }
    
    else{
        mysqli_query($conn , "insert into admin set name='$name' , email ='$email' , Address ='$address', phonenum='$phone_num' , password ='$passwordc'")
        or die('query failed'.mysqli_error($conn));
        header('location:post.php');
    }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php
if (isset($message)) {
    foreach ($message as $messages) {
        echo '
        <div class="message">
            <span>' . $messages. '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
}
?>

    <div class="form-container">

        <form action="" method="post">
            <h3>register now</h3>
            <input type="text" name="name" placeholder="enter your name" required class="box">
            <input type="email" name="email" placeholder="enter your email" required class="box">
            <input type="text" name="address" placeholder="enter your address" required class="box">
            <input type="text" name="phonenum" placeholder="enter your phone number" required class="box">
            <input type="password" name="password" placeholder="enter your password" required class="box">
            <input type="password" name="cpassword" placeholder="confirm your password" required class="box">

            <input type="submit" name="submit" value="register now" class="btn">
            <p>already have an account? <a href="login.php">login now</a></p>
        </form>

    </div>

</body>

</html>