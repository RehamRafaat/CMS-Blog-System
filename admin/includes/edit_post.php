<?php 
    if(isset($_GET['p_id']))
    {
        $the_post_id = $_GET['p_id'];
    }
    $query = "select * from posts where post_id = $the_post_id";
    $select_post_by_id = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($select_post_by_id))
    {
        $post_id = $row['post_id']; 
        $post_auther = $row['post_auther'];
        $post_title = $row['post_title'];
        $post_category = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comments = $row['post_comment_count'];
        $post_date = $row['post_date'];
        $post_content = $row['post_content'];
    }
    if(isset($_POST['up_post']))
    {
        $edited_post_auther = $_POST['post_auther'];
        $edited_post_title = $_POST['post_title'];
        $edited_post_category = $_POST['post_category'];
        $edited_post_status = $_POST['post_status'];
        
        $edited_post_image = $_FILES['post_image']['name'];
        $edited_post_image_temp = $_FILES['post_image']['tmp_name'];
        
        $edited_post_tags = $_POST['post_tags'];
        $edited_post_comments = $_POST['post_comment_count'];
        $edited_post_date = $_POST['post_date'];
        $edited_post_content = mysqli_real_escape_string($conn,$_POST['post_content']);
        
        move_uploaded_file($edited_post_image_temp,"../images/posts/$edited_post_image");
        
        if(empty($edited_post_image))
        {
            $que = "select * from posts where post_id = $select_post_by_id";
            $res = mysqli_query($conn,$que);
            while($row = mysqli_fetch_assoc($res))
            {
                $edited_post_image = $row['post_image'];
            }
        }
        $query3 = "update posts set
                 post_title = '{$edited_post_title}',
                 post_category_id = '{$edited_post_category}',
                 post_date = now(),
                 post_auther = '{$edited_post_auther}',
                 post_status = '{$edited_post_status}',
                 post_tags = '{$edited_post_tags}',
                 post_content = '{$edited_post_content}',
                 post_image = '{$edited_post_image}'
                 where post_id = '{$the_post_id}'";
        
        $update_post_by_id = mysqli_query($conn,$query3);
        confirm_query($update_post_by_id);
        header("Location: posts.php");
    }      
?>
 <form action="" method="post" enctype="multipart/form-data">
  
   <div class="form-group">
        <label for="title">Post Title</label>
        <input class="form-control" type="text" name="post_title" value="<?php echo $post_title; ?>">
    </div>
    <div class="form-group">
        <label for="post_category">Post Category</label>
        <select class="form-control" name="post_category" id="post_category">
           <?php
                $query2 = "select * from categories";
                $select_category = mysqli_query($conn,$query2);
                confirm_query($select_category);
                while($row = mysqli_fetch_assoc($select_category))
                {
                    $cat_id = $row['cat_id']; 
                    $cat_title = $row['cat_title'];
                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="auther">Post Auther</label>
        <input class="form-control" type="text" name="post_auther" value="<?php echo $post_auther; ?>">
    </div>
    <div class="form-group">
        <label for="post_date">Post Date</label>
        <input class="form-control" type="date" name="post_date" value="<?php echo $post_date; ?>">
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <img width="150" height="100" src="../images/posts/<?php echo $post_image; ?>">
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content"><?php echo $post_content; ?></textarea>
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input class="form-control" type="text" name="post_tags" value="<?php echo $post_tags; ?>">
    </div>
    <div class="form-group">
        <label for="post_comment_count">Post Comment Count</label>
        <input class="form-control" type="text" name="post_comment_count" value="<?php echo $post_comments; ?>">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select class="form-control" name="post_status" id="post_status">
            <option value="draft">draft</option>
            <option value="published">published</option>
        </select>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="up_post" value="update">
    </div>
</form>