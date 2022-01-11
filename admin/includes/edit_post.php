<form action="" method="post" enctype="multipart/form-data">
  
   <div class="form-group">
        <label for="title">Post Title</label>
        <input class="form-control" type="text" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_category_id">Post Category ID</label>
        <input class="form-control" type="text" name="post_category_id">
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
        <input class="form-control" type="text" name="post_content">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input class="form-control" type="text" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_comment_count">Post Comment Count</label>
        <input class="form-control" type="text" name="post_comment_count">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input class="form-control" type="text" name="post_status">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="publish">
    </div>
</form>