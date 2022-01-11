<form action="" method="post">
    <label for="cat_title">Edit Category</label>
    <?php
        if(isset($_GET['edit']))
        {
            $edit_cat_id = $_GET['edit'];
            $query2 = "select * from categories where cat_id = '{$edit_cat_id}'";
            $category_view_query = mysqli_query($conn,$query2);
            while($row = mysqli_fetch_assoc($category_view_query))
            {
                $cat_id = $row['cat_id']; 
                $cat_title = $row['cat_title'];
    ?>
    <div class="form-group">
        <input class="form-control" type="text" name="cat_title" value="<?php if(isset($_GET['edit'])){echo $cat_title;} ?>">
    </div>
        <?php   }
        }
    ?>
    <?php
        if(isset($_POST['update_category']))
        {
            $cat_tittle = $_POST['cat_title'];
            $que = "update categories set cat_title = '{$cat_tittle}' where cat_id = {$cat_idd}";
            mysqli_query($conn,$que);
            
        }
    ?>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Edit Category">
    </div>
</form>