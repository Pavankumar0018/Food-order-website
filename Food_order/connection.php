<?php
//Start Session
session_start();

//making site URL
define('SITEURL','http://localhost/food_order');

 

// Data base connection
    $server_name="localhost";
    $username="root";
    $password="";
    $db_name="food_order";
    
    $conn = mysqli_connect($server_name,$username,$password,$db_name);
    if($conn){
        // echo "connection successful";
    }
    else{
        echo "db not connected";
    }

?>