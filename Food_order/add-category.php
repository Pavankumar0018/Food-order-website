<?php include('partials/menu.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add category</title>
</head>
<body>
    <div class="main-content">
        <div class="wrapper">
            <br>
            <h2>Add category</h2><br>

            <br>
            <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            ?>
            
            
            <br>
            <!-- enctype="multipart/form-data"  ==>> for adding images-->
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title: </td>
                        <td><input type="text" name="title" placeholder="Category title"></td>
                    </tr>
                    <tr>

                    <tr>
                        <td>Select Image: </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                        <td>Featured: </td>
                        <td>
                            <input type="radio" name="featured" value="YES" > Yes  
                            <input type="radio" name="featured" value="NO"> No
                        </td>
                    </tr>
                    <tr>
                        <td>Active: </td>
                        <td>
                            <input type="radio" name="active" value="YES"> Yes  
                            <input type="radio" name="active" value="NO"> No
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>

<?php include('partials/footer.php');?>

<?php
    if(isset($_POST['submit'])){
        $title=$_POST['title'];

        if(isset($_POST['featured'])){
            $featured=$_POST['featured'];
        }
        else{
            $featured="NO";
        }
        if(isset($_POST['active'])){
            $active=$_POST['active'];
        }
        else{
            $active="NO";
        }

        
        // to print the arrary
        // print_r($_FILES['image']);
        // die();
        // result:
        // Array ( [name] => image.png [full_path] => image.png [type] => image/png [tmp_name] => D:\XAMPP\tmp\php9389.tmp [error] => 0 [size] => 12666 )

        if(isset($_FILES['image']['name'])){
            $image_name=$_FILES['image']['name'];

            //auto rename image name
            //Get extension of images .jpg etc
            $temp=explode('.', $image_name);
            $ext=end($temp);

            $image_name="Food_Category_".rand(000,999).'.'.$ext; // now image name like this --> Food_Category_878

            $source_path = $_FILES['image']['tmp_name'];
            $destination_path="images/category/".$image_name;

            //Final upload
            $upload = move_uploaded_file($source_path,$destination_path);

            //check image uploaded or not 

            if($upload==false){
                $_SESSION['upload']="<div class='error'>Failed to upload</div>";
                header('location:add-category.php');
                die();
            }
            // else{
            //     $image_name="";
            // }
        }
        $query="INSERT INTO tbl_catagory (title,image_name, featured, active) VALUES ('$title','$image_name','$featured','$active')";
        $res=mysqli_query($conn,$query);
        if($res){
            $_SESSION['add']="<div class='success'>Category added successfully</div>";
            header('location:Category.php');
        }
        else{
            $_SESSION['add']="<div class='error'>Something went wrong</div>";
            header('location:add-category.php');
        }
    }
?>