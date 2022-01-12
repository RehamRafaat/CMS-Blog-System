<?php include "db.php"; ?>
<?php session_start(); ?>

<?php 

if(isset($_POST['login']))
{
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $user_password = mysqli_real_escape_string($conn,$_POST['user_password']);
    
    $query = "select * from users where user_name = '$username' and user_role = 'admin'";
    $select_user_query = mysqli_query($conn,$query);
    if(!$select_user_query)
    {
        die("query failed"." ".mysqli_error($conn));
    }
    while($row = mysqli_fetch_array($select_user_query))
    {
        $db_user_id = $row['user_id'];
        $db_user_name = $row['user_name'];
        $db_user_first_name = $row['user_first_name'];
        $db_user_last_name = $row['user_last_name'];
        $db_user_password = $row['user_password'];
        $db_user_role = $row['user_role'];
    }
    if($username !== $db_user_name && $user_password !== $db_user_password)
    {
        header("Location: ../index.php?error=data");
    }
    else if($username == $db_user_name && $user_password == $db_user_password)
    {
        $_SESSION['user_id'] = $db_user_id;
        $_SESSION['username'] = $db_user_name;
        $_SESSION['user_first_name'] = $db_user_first_name;
        $_SESSION['user_last_name'] = $db_user_last_name;
        $_SESSION['user_email'] = $db_user_email;
        $_SESSION['user_password'] = $db_user_password;
        $_SESSION['user_role'] = $db_user_role;
        $_SESSION['user_image'] = $db_user_image;
        header("Location: ../admin/index.php?login=success");
    }
    else
    {
        header("Location: ../index.php?error=password");
    }
}
?>