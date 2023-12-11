<?php
    include("partials/menu.php");
    // include("connection.php");
?>
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
            <h2>Update category</h2><br>

            <br>

            <!-- fetching data and storing in variables-->
            <?php
                $idl=$_GET['id'];
                $fetch="SELECT * FROM tbl_catagory WHERE id='$idl";
                $res=mysqli_query($conn,$fetch);
                $data=mysqli_fetch_array($res);
                
                $title_prev=$data['title'];
                $featured_prev=$data['featured'];
                $active_prev=$data['active'];


            ?>
            <!-- enctype="multipart/form-data"  ==>> for adding images-->
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title: </td>
                        <td><input type="text" name="title" placeholder="Category title" value="<?php echo $title_prev;?>"></td>
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
<?php
    include("partials/footer.php");
?>