<?php include('partials/menu.php'); ?>
<head>
    <link rel="stylesheet" href="admin.css">
</head>

<div class="main-content">
        <div class="wrapper">
            <h2>Manage Food Catogory</h2>
            <br/><br/>
            <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['del'])){
                echo $_SESSION['del'];
                unset($_SESSION['del']);
            }
            ?>
            <br/><br/>
            <!-- Button to add catagory -->
            <a href="add-category.php" class="btn-primary"> Add Catagory</a>
            
            <br/><br>


            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

                <?php

                    $db_query = "SELECT * FROM tbl_catagory";

                    $res = mysqli_query($conn, $db_query);

                    $count=mysqli_num_rows($res);
                    if($count>0){
                        $sn=1;
                        while($data=mysqli_fetch_assoc($res)){
                            
                            $id=$data['id'];
                            $image_name=$data['image_name'];
                            $title=$data['title'];
                            $featured=$data['featured'];
                            $active=$data['active'];
                            ?>
                            
                                <tr>
                                    <td><?php echo $sn ?></td>
                                    <td><?php echo $title ?></td>
                                    <td>
                                        <?php 
                                            if($image_name!=""){
                                                ?>
                                                <img src="images/category/<?php echo $image_name;?>" width="20%" alt="">
                                                <?php
                                                
                                            }
                                            else{
                                                echo "<div class='error'>image not added.</div>";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $featured ?></td>
                                    <td><?php echo $active ?></td>
                                    <td>
                                        <a href="update-category.php?id=<?php echo $id;?> & image_name=<?php echo $image_name?>" class="btn-secondary">Update Category</a>
                                        <a href="delete-category.php?id=<?php echo $id;?> & image_name=<?php echo $image_name?>" class="btn-danger">Delete Category</a>
                                    </td>
                                </tr>
                            <?php
                            $sn++;
                        }
                    }
                    else{

                        ?>
                        <tr colspan=6>
                            <td><div class="error">No Data Found</div></td>
                        </tr>
                        <?php
                    }
                    
                    
                ?>

                
               
            </table>

        </div>
    </div>

<?php include('partials/footer.php'); ?>