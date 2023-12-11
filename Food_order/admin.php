<?php include('partials/menu.php');
    // include('login-page/login.php');
 ?>
<head>
    <link rel="stylesheet" href="admin.css">
</head>

    <!-- main-content section -->
    <div class="main-content">
        <div class="wrapper">
            <h2>Manage Admin</h2>
            <br/><br/>
            
            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);//removing session message
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

            ?>

            <br/><br/>
            <!-- Button to add admin -->
            <a href="add-admin.php" class="btn-primary"> Add Admin</a>

            <br/><br/>
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
                
                <?php
                    $sql = "SELECT * FROM tbl_admin";
                    $res=mysqli_query($conn,$sql);
                    // $data = mysqli_fetch_array($res);
                    if($res){
                        $rows = mysqli_num_rows($res);
                        if($rows>0){
                            while($data = mysqli_fetch_array($res)){
                                ?>
                                <tr>
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['full_name']; ?></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td>
                                        <a href="update-admin.php?id=<?php echo $data['id']; ?>" class="btn-secondary">Update Admin</a>
                                        <a href="delete.php?id=<?php echo $data['id']; ?>" id="delete_button" class="btn-danger" >Delete Admin</a>
                                    </td>
                                </tr> 
                                <?php
                            }
                        }
                        else{
                            //No data in database
                            ?>
                            <script>
                                alert("No data in database");
                            </script>
                            <?php
                        }
                    }
                ?>

            </table>

        </div>
    </div>

    <?php include('partials/footer.php'); ?>
<!-- 
    <script>
        document.getElementById("delete_button").addEventListener("click",function(event){
            event.preventDefault();
            if(confirm("Do You Really Wants to Delete ?")==true){
                window.location.href="delete.php?id=<php echo $data['id']; ?>";
            }
        });
    </script> -->