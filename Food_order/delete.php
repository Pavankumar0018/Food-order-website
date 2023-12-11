<?php

    include('connection.php');

    // echo "You are on delete page";
    $idl=$_GET['id'];
    $query="DELETE FROM tbl_admin WHERE id='$idl'";
    $res = mysqli_query($conn,$query);
    if($res){
        // >
        // <script>
        //     alert("Data deleted successfully");
        // </script>

        // <meta http-equiv="refresh"  
        // content="0; url = http://localhost/Food_order/admin.php" />
        // <?php
        $_SESSION['delete']="<div class='success'>Admin deleted successfully</div>";
        header('location:admin.php');
        
    }
    else{
        // >
        // <script>
        //     alert("Data not found");
        // </script>
        // <?php
        $_SESSION['delete']="<div class='error'> Admin not deleted</div>";
        header(location:"admin.php");
    }

?>