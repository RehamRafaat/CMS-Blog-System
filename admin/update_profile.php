<?php include "includes/admin_header.php" ?>

    <div id="wrapper">

        
        <?php include "includes/admin_nav.php" ?>
        
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">  
                        <h1 class="page-header">
                            Update Profile
                            <small><?php echo  $_SESSION['user_first_name']; ?></small>
                        </h1>
<?php 
    if(isset($_SESSION['user_id']))
    {
        $the_user_id = $_SESSION['user_id'];
    }
    $query = "select * from users where user_id = $the_user_id";
    $select_user_by_id = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($select_user_by_id))
    {
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_password = $row['user_password'];
        $user_first_name = $row['user_first_name'];
        $user_last_name = $row['user_last_name'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
        $user_randsalt = $row['user_randsalt'];
    }
    if(isset($_POST['update_user']))
    {
        $edited_user_name = $_POST['user_name'];
        $edited_user_password = $_POST['user_password'];
        $edited_user_first_name = $_POST['user_first_name'];
        $edited_user_last_name = $_POST['user_last_name'];
        $edited_user_emails = $_POST['user_email'];
        
        $edited_user_image = $_FILES['user_image']['name'];
        $edited_user_image_temp = $_FILES['user_image']['tmp_name'];
        
        $edited_user_role = $_POST['user_role'];
        
        move_uploaded_file($edited_user_image_temp,"../images/users/$edited_user_image");
        
        if(empty($edited_user_image))
        {
            $que = "select * from users where user_id = $the_user_id";
            $res = mysqli_query($conn,$que);
            while($row = mysqli_fetch_assoc($res))
            {
                $edited_user_image = $row['user_image'];
            }
        }
        $query3 = "update users set
                 user_name = '{$edited_user_name}',
                 user_password = '{$edited_user_password}',
                 user_first_name = '{$edited_user_first_name}',
                 user_last_name = '{$edited_user_last_name}',
                 user_email = '{$edited_user_emails}',
                 user_image = '{$edited_user_image}',
                 user_role = '{$edited_user_role}'
                 where user_id = '{$the_user_id}'";
        
        $update_user_by_id = mysqli_query($conn,$query3);
        confirm_query($update_user_by_id);
        $_SESSION['user_id'] = $db_user_id;
        $_SESSION['username'] = $edited_user_name;
        $_SESSION['user_first_name'] = $edited_user_first_name;
        $_SESSION['user_last_name'] = $edited_user_last_name;
        $_SESSION['user_email'] = $edited_user_emails;
        $_SESSION['user_password'] = $edited_user_password;
        $_SESSION['user_role'] = $edited_user_role;
        $_SESSION['user_image'] = $edited_user_image;
        header("Location: profile.php");
    }      
?>
 <form action="" method="post" enctype="multipart/form-data">
  
   <div class="form-group">
        <label for="title">Username</label>
        <input class="form-control" type="text" name="user_name" value="<?php echo $user_name; ?>">
    </div>
    <div class="form-group">
        <label for="auther">User_password</label>
        <input class="form-control" type="password" name="user_password" value="<?php echo $user_password; ?>">
    </div>
    <div class="form-group">
        <label for="post_date">User First Name</label>
        <input class="form-control" type="text" name="user_first_name" value="<?php echo  $user_first_name; ?>">
    </div>
    <div class="form-group">
        <label for="post_date">User Last Name</label>
        <input class="form-control" type="text" name="user_last_name" value="<?php echo $user_last_name; ?>">
    </div>
    <div class="form-group">
        <label for="post_content">User Email</label>
        <input class="form-control" type="email" name="user_email" value="<?php echo $user_email; ?>">
    </div>
    <div class="form-group">
        <img width="150" height="100" src="../images/users/<?php echo $user_image; ?>">
        <label for="user_image">User Image</label>
        <input type="file" name="user_image">
    </div>
    <div class="form-group">
        <label for="user_role">User role</label>
        <select class="form-control" name="user_role" id="user_role">
           <?php
                if($user_role == 'admin')
                {
                    echo "<option value='admin'>Admin</option>";
                    echo  "<option value='subscriber'>Subscriber</option>";
                }
                else
                {
                     echo  "<option value='subscriber'>Subscriber</option>";
                     echo "<option value='admin'>Admin</option>";
                }
            ?>
        </select>
     </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_user" value="update">
    </div>
</form>
 </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>