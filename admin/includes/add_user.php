<?php
    if(isset($_POST['create_post']))
    {
        $post_title = $_POST['post_title'];
        $post_auther = $_POST['post_auther'];
        $post_category = $_POST['post_category'];
        $post_content = mysqli_real_escape_string($conn,$_POST['post_content']);
        
        $post_status = $_POST['post_status'];
        
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        
        
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        
        
        move_uploaded_file($post_image_temp,"../images/posts/$post_image");
        $query = "insert into posts(post_category_id,post_title,post_auther,post_date,post_image,post_content,post_tags,post_status) values('{$post_category}','{$post_title}','{$post_auther}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
        
        $res = mysqli_query($conn,$query);
        confirm_query($res);
    }
?>
 <form action="" method="post" enctype="multipart/form-data">
  
   <div class="form-group">
        <label for="title">Post Title</label>
        <input class="form-control" type="text" name="post_title">
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
        <input class="form-control" type="text" name="post_auther">
    </div>
    <div class="form-group">
        <label for="post_date">Post Date</label>
        <input class="form-control" type="date" name="post_date">
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content"></textarea>
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input class="form-control" type="text" name="post_tags">
     </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select class="form-control" name="post_status" id="post_status">
            <option value="draft">draft</option>
            <option value="published">published</option>
        </select>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="publish">
    </div>
</form>