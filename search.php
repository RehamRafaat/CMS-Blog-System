<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>


<body>
    <?php include "includes/nav.php" ?>
   
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

               <?php
    
                if(isset($_POST['submit']))
                {
                    $search = $_POST['search'];
                    $query = "SELECT * from posts WHERE post_tags LIKE '%$search%' ";
                    $search_query = mysqli_query($conn,$query);

                    $count = mysqli_num_rows($search_query);
                    if($count == 0)
                    {
                        echo "<h2>No Result</h2>";
                    }
                    else
                    {
                        $query = "select * from posts WHERE post_tags LIKE '%$search%'";
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
                        
                        <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                 <h2><a href="#"><?php echo $post_title ?></a></h2>
                
                <p class="lead">
                    by <a href="index.php"><?php echo $post_auther ?></a>
                </p>
                
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

               

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

                        
                <?php
                        }
                    }
                }
                ?>
                
                                
                
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
