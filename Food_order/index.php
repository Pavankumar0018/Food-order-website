<?php include('partials/menu.php');
    //   include('login-page/login.php');
 ?>
    <!-- main-content section -->
    <div class="main-content">
        <div class="wrapper">
            <h2>DASHBOARD</h2>
            <br><br>
            <?php
                if(isset($_SESSION['user']))
                {
                    echo "Welcome Back ". $_SESSION['user'];
                    unset($_SESSION['add']);//removing session message
                }
            ?>
            <br><br>
            <div class="col-4 text-center">
                <h1>5</h1>
                </br>
                Categories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                </br>
                Categories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                </br>
                Categories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                </br>
                Categories
            </div>
            <div class="clearfix"></div>

        </div>
    </div>

   <?php include('partials/footer.php'); ?>