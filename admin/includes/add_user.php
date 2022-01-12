<?php
    if(isset($_POST['add_new_user']))
    {
        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
        $user_first_name = $_POST['user_first_name'];
        $user_Last_name = $_POST['user_last_name'];
        $user_email = $_POST['user_email'];
        
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
    
        $user_role = $_POST['user_role'];
        
        move_uploaded_file($user_image_temp,"../images/users/$user_image");
        $query = "insert into users(user_name,user_password,user_first_name,user_last_name,user_email,user_image,user_role) values('{$user_name}','{$user_password}','{$user_first_name}','{$user_Last_name}','{$user_email}','{$user_image}','{$user_role}')";
        
        $res = mysqli_query($conn,$query);
        confirm_query($res);
        header("Location: users.php");
    }
?>
 <form action="" method="post" enctype="multipart/form-data">
  
   <div class="form-group">
        <label for="title">Username</label>
        <input class="form-control" type="text" name="user_name">
    </div>
    <div class="form-group">
        <label for="auther">User_password</label>
        <input class="form-control" type="password" name="user_password">
    </div>
    <div class="form-group">
        <label for="post_date">User First Name</label>
        <input class="form-control" type="text" name="user_first_name">
    </div>
    <div class="form-group">
        <label for="post_date">User Last Name</label>
        <input class="form-control" type="text" name="user_last_name">
    </div>
    <div class="form-group">
        <label for="post_content">User Email</label>
        <input class="form-control" type="email" name="user_email">
    </div>
    <div class="form-group">
        <label for="user_image">User Image</label>
        <input type="file" name="user_image">
    </div>
    <div class="form-group">
        <label for="user_role">User role</label>
        <select class="form-control" name="user_role" id="user_role">
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
     </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_new_user" value="Add">
    </div>
</form>