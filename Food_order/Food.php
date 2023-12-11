<?php include('partials/menu.php');
?>
<head>
    <link rel="stylesheet" href="admin.css">
</head>
<div class="main-content">
        <div class="wrapper">
            <h2>Manage Food Item</h2>
            <br/><br/>
            <!-- Button to add admin -->
            <a href="#" class="btn-primary"> Add Food</a>

            <br/><br/>
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <tr>
                    <td>1.</td>
                    <td>Pavan kumar</td>
                    <td>Pavan</td>
                    <td>
                        <a href="#" class="btn-secondary">Update Admin</a>
                        <a href="#" class="btn-danger">Delete Admin</a>
                    </td>
                </tr>

                <tr>
                    <td>2.</td>
                    <td>Pavan kumar</td>
                    <td>Pavan</td>
                    <td>
                        <a href="#" class="btn-secondary">Update Admin</a>
                        <a href="#" class="btn-danger">Delete Admin</a>
                    </td>
                </tr>
            </table>

        </div>
    </div>

<?php include('partials/footer.php'); ?>