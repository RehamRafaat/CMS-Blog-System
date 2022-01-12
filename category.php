<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>


<body>
    <?php include "includes/nav.php" ?>
   
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

               <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
              
               <?php
    
                    if(isset($_GET['category']))
                    {
                        $post_category_id = $_GET['category'];
                    }
                    $posts_counter = 0;
                    $query = "select * from posts where post_category_id = $post_category_id and post_status = 'published'";
                    $select = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($select))
                    {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_auther = $row['post_auther'];
                        $post_date = $row['post_date'];
                        $post_content = substr($row['post_content'],0,50);
                        $post_tags = $row['post_tags'];
                        $post_image = $row['post_image'];
                        
                ?>
               

                <!-- First Blog Post -->
                 <h2><a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></h2>
                
                <p class="lead">
                    by <a href="index.php"><?php echo $post_auther; ?></a>
                </p>
                
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>"><img class="img-responsive" src="images/posts/<?php echo $post_image; ?>" alt=""></a>
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>


                                
                <?php  
                    $posts_counter = $posts_counter + 1;
                    }
                    if($posts_counter == 0)
                    {
                        echo "<h1>No posts to be shown</h1>";
                    }
                ?>
                
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>
                
            </div>

            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
       <?php
    
    include "includes/footer.php";
?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
