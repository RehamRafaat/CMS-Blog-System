<!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

               
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                
                <!-- Login -->
              <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <input name="username" placeholder="username" type="text" class="form-control">
                    </div>
                    <div class="input-group">
                        <input name="user_password" placeholder="password" type="password" class="form-control">
                        <span class="input-group-btn">
                           <button name="login" class="btn btn-primary" type="submit">Login</button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

               
               
                <!-- Blog Categories Well -->
                <div class="well">
                   
                    <?php 
                       $query = "SELECT * from categories";
                        $select_categ_sidebar = mysqli_query($conn,$query);        
                    ?>
                   
                   
                   
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                               
                               <?php
                                    while($row = mysqli_fetch_assoc($select_categ_sidebar))
                                    {
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                        echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                                    }
                                ?>
                               
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "widget.php" ?>

            </div>