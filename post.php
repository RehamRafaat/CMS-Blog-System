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
                    if(isset($_GET['p_id']))
                    {
                        $the_post_id = $_GET['p_id'];
                    }
                    $query = "select * from posts where post_id = $the_post_id";
                    $select = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($select))
                    {
                        $post_title = $row['post_title'];
                        $post_auther = $row['post_auther'];
                        $post_date = $row['post_date'];
                        $post_content = $row['post_content'];
                        $post_tags = $row['post_tags'];
                        $post_image = $row['post_image'];
                        
                ?>
               

                <!-- First Blog Post -->
                 <h2><a href="#"><?php echo $post_title ?></a></h2>
                
                <p class="lead">
                    by <a href="index.php"><?php echo $post_auther ?></a>
                </p>
                
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/posts/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>

                <hr>


                                
                <?php    } ?>
                
                 
                <!-- Blog Comments -->
                <?php
                    
                    if(isset($_POST['create_comment']))
                    {
                        $the_post_id = $_GET['p_id'];
                        $comment_auther = $_POST['comment_auther'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];
                        $quer = "insert into comments (comment_post_id,comment_auther,comment_email,comment_content,comment_status,comment_date) values ('$the_post_id','$comment_auther','$comment_email','$comment_content','unapproved',now())";
                        $comment_insert_query = mysqli_query($conn,$quer);
                        if(!$comment_insert_query)
                        {
                            die("Query Faild"." ".mysqli_error());
                        }
                        $quer2 = "update posts set post_comment_count = post_comment_count + 1 where post_id = $the_post_id";
                        $update_comment_count_query = mysqli_query($conn,$quer2);
                        if(!$update_comment_count_query)
                        {
                            die("Query Faild"." ".mysqli_error());
                        }
                    }
                
                ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                      <div class="form-group">
                           <label for="Auther">Auther</label>
                            <input type="text" class="form-control" name="comment_auther">
                        </div>
                       <div class="form-group">
                           <label for="Email">Email</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                           <label for="Comment">Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Send</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php
                    $query = "select * from comments where comment_post_id = '$the_post_id' and comment_status = 'approved' order by comment_id desc";
                    $comment_view_query = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_assoc($comment_view_query))
                    {
                        $comment_auther = $row['comment_auther'];
                        $comment_content = $row['comment_content'];
                        $comment_date = $row['comment_date'];         
                    ?>
                <div class="media">
                   
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_auther; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                   
                </div>
                 <?php } ?>
               
               
                <!-- Comment -->
                
               <!-- <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        
                    </div>
                </div>-->
                
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
