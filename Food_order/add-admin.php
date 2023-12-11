<?php include("partials/menu.php") ?>
 
<div class="main-content">
    <div class="wrapper">
        <h2>Add Admin</h2>
        <br/><br/>
            
            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']); //removing session message
                }

            ?>
        <br/><br/>

        <form action="#" method="POST">
            <table>
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td> 
                        <input type="text" name="username" placeholder="Enter Your Username">
                    </td>
                </tr>
                <tr>
                <td>Password:</td>
                <td>
                    <input type="password" name="password" placeholder="Enter Password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>
            </table>
        </form>
    </div>
</div>

<?php include("partials/footer.php");
?>


<?php 
    if(isset($_POST['submit'])){
        $name=$_POST['full_name'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $check_query="SELECT * FROM tbl_admin WHERE username='$username'";
        $query="INSERT INTO tbl_admin (full_name,username,password) VALUES ('$name','$username','$password')";
        // $query = "INSERT INTO usr (fname,lname,phone,email,password) VALUES ('$fname','$lname','$phone','$email','$pwd')";
        $res = mysqli_query($conn,$check_query);
        
        $rows=mysqli_num_rows($res);
        if($rows<1){
            $data=mysqli_query($conn,$query);
            if($data){
                
                $_SESSION['add']="<div class='success'>Admin added Sucessfully</div>";
                ?>
                <script>
                    alert("Admin added Sucessfully");
                </script>
                <?php
                header('location:admin.php');
            }
            else{
                ?>
                <script>
                    alert("Admin Not added");
                </script>
                <?php
            }
        }
        else{
            ?>
            <script>
                alert("Username Already Exist");
                alert("Try Again");
            </script>
            <?php
            $_SESSION['add']="<div class='error'>Failed to Add Admin</div>";
            header('location:add-admin.php');
        }

        
    }
?>