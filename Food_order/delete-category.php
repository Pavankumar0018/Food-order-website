<?php
    include('connection.php');

    $idl=$_GET['id'];
    // echo $idl;
    // die();
    $query= "DELETE FROM tbl_catagory WHERE id='$idl'";
    $res=mysqli_query($conn,$query);
    if($res){
        $_SESSION['del']="<div class='success'>Data deleted Successfully</div>";
        header('location:Category.php');
    }
    else{
        $_SESSION['del']="<div class='error'>Something went wrong</div>";
        header('location:Category.php');
    }
?>