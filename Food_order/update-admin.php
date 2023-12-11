<?php
    include('partials/menu.php');
?>
    <div class="main-content">
        <div class="wrapper">
            <h2>Update admin</h2>

            </br></br>
           
            <?php
            $idl= $_GET['id'];
            // $query="select * from usr where id='$idl'";
            $retrive="SELECT * FROM tbl_admin WHERE id='$idl'";
            $res = mysqli_query($conn,$retrive);
            $data=mysqli_fetch_array($res);
            
            ?>
            <form action="#" method="POST">
            <table>
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name" require value="<?php echo $data['full_name']; ?>" >
                    </td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td> 
                        <input type="text" name="username" placeholder="Enter Your Username" require value="<?php echo $data['username']; ?>">
                    </td>
                </tr>
                <tr>
                <td>Password:</td>
                <td>
                    <input type="password" name="password" placeholder="Enter Password" require value="<?php echo $data['password']; ?>">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                </td>
            </tr>
            </table>
        </form>

        </div>
    </div>
<?php
    include('partials/footer.php');
?>

<?php

if(isset($_POST['submit'])){
    $name=$_POST['full_name'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    $check_query="SELECT * FROM tbl_admin WHERE username='$username'";
    $dbcon=mysqli_query($conn,$check_query);
    $rows=mysqli_num_rows($dbcon);
    if($rows>0){
        ?>
        <script>
            alert("Username already exist try again");
        </script>
        <?php
        $_SESSION['update']="<div class='error'>username already exist try again</div>";
        header("location:admin.php");
    }
    else{
        $update_query="UPDATE tbl_admin SET full_name='$name', username='$username', password='$password' WHERE id='$idl'";
        $res=mysqli_query($conn,$update_query);
        if($res){
            ?>
            <script>
                alert("Data updated successfully");
            </script>
            <?php
            $_SESSION['update']="<div class='success'>Admin updated successfully</div>";
            header("location:admin.php");
        }
        else{
            ?>
            <script>
                alert("Data not updated try again");
            </script>
            <?php
            $_SESSION['update']="<div class='error'>Admin not Updated try again</div>";
            header("location:admin.php");
        }
    }
    
}

?>