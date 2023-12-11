<?php include('../connection.php');
    unset($_SESSION['user']);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="login">
        <div class="center">
            <h2 class="text-center">Login</h2>
            <br>

            <?php
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <br>

            <?php
            if(isset($_SESSION['not-login'])){
                echo $_SESSION['not-login'];
                unset($_SESSION['not-login']);
            }

            ?>

            <form action="" method="POST" autocomplete="off">
                <label for="">Username:</label>
                <input type="text" name="username" placeholder="Enter Your Username"></br></br>
                <label for="">Password:</label>
                <input type="Password" name="password" placeholder="Enter Password Here"></br>

                <br><br>
                <input type="submit" value="Login" name="submit" class="btn-primary">
                <br><br>
            </form>
            <p class="text-center">Created By - <a href="#">Pavan Kumar</a></p>
        </div>
    </div>
</body>
</html>

<?php

    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];

        $check_query= "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        $data=mysqli_query($conn,$check_query);
        $rows=mysqli_num_rows($data);
        $rows;
        if($rows>=1){
            // $_SESSION['login']="<div class='success text-center'>Login Successful</div>";
            $_SESSION['user']=$username;
            // >
            //     <meta http-equiv="refresh" 
            //     content="0; url = ../index.php" />
            // <?php
            header('location:../index.php');

        }
        else{
            $_SESSION['login']="<div class='error text-center'>invalid username or password</div>";
            ?>
                <meta http-equiv="refresh" 
                content="0; url = login.php" />
            <?php
        }
    }

?>