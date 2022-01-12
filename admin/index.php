<?php include "includes/admin_header.php" ?>

    <div id="wrapper">
    
        
        <?php include "includes/admin_nav.php" ?>
        
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small><?php echo  $_SESSION['user_first_name']; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <?php
                        $post_count_query = "select * from posts";
                        $post_count_query_con = mysqli_query($conn,$post_count_query);
                        $posts_num = mysqli_num_rows($post_count_query_con);
                     ?>
                  <div class='huge'><?php echo $posts_num; ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="./posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                        $comment_count_query = "select * from comments";
                        $comment_count_query_con = mysqli_query($conn,$comment_count_query);
                        $comment_num = mysqli_num_rows($comment_count_query_con);
                     ?>
                     <div class='huge'><?php echo $comment_num; ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="./comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                        $user_count_query = "select * from users";
                        $user_count_query_con = mysqli_query($conn,$user_count_query);
                        $user_num = mysqli_num_rows($user_count_query_con);
                     ?>
                    <div class='huge'><?php echo $user_num; ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="./users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                        $cat_count_query = "select * from users";
                        $cat_count_query_con = mysqli_query($conn,$cat_count_query);
                        $cat_num = mysqli_num_rows($cat_count_query_con);
                     ?>
                        <div class='huge'><?php echo $cat_num; ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="./categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
                
        <?php
             $draft_post_count_query = "select * from posts where post_status = 'draft'";
             $draft_post_count_query_con = mysqli_query($conn,$draft_post_count_query);
             $draft_posts_num = mysqli_num_rows($draft_post_count_query_con); 
                
             $active_post_count_query = "select * from posts where post_status = 'published'";
             $active_post_count_query_con = mysqli_query($conn,$active_post_count_query);
             $active_posts_num = mysqli_num_rows($active_post_count_query_con);
                
             $approved_comment_count_query = "select * from comments where comment_status = 'approved'";
             $approved_comment_count_query_con = mysqli_query($conn,$approved_comment_count_query);
             $approved_comment_num = mysqli_num_rows($approved_comment_count_query_con);
                
             $unapproved_comment_count_query = "select * from comments where comment_status = 'unapproved'";
             $unapproved_comment_count_query_con = mysqli_query($conn,$unapproved_comment_count_query);
             $unapproved_comment_num = mysqli_num_rows($unapproved_comment_count_query_con);
                
             $admin_count_query = "select * from users where user_role = 'admin'";
             $admin_count_query_con = mysqli_query($conn,$admin_count_query);
             $admin_num = mysqli_num_rows($admin_count_query_con);
                
             $sub_count_query = "select * from users where user_role = 'subscriber'";
             $sub_count_query_con = mysqli_query($conn,$sub_count_query);
             $sub_num = mysqli_num_rows($sub_count_query_con);
        ?>
                
<div class="row">
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            
           <?php
            $element_text = ['All Posts','Active Posts','Draft Posts','All Comments','Approved Comments','Unapproved Comments','All Users','Admins','Subscribers','Categories'];
            $element_count = [$posts_num,$active_posts_num,$draft_posts_num,$comment_num,$approved_comment_num,$unapproved_comment_num,$user_num,$admin_num,$sub_num,$cat_num];
            for($i = 0; $i < 10; $i++)
            {
                echo "['{$element_text[$i]}'".","."{$element_count[$i]}],";
            }
            ?>
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
    
</div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>