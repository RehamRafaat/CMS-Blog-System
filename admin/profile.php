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
                        <table class="table">
                            <thead>
                                <th>Username</th>
                                <th>Profile Picture</th>
                            </thead>
                            <tbody>
                               <tr>
                                  <td>
                                      <div class="form-group">
                                        <h2><?php echo $_SESSION['username']; ?></h2>
                                      </div>
                                  </td>
                                  <td>
                                     <div class="form-group">
                                        <h2><img class="img-responsive" width="100" src="../images/users/<?php echo $_SESSION['user_image']; ?>"></h2>
                                    </div> 
                                  </td> 
                               </tr>
                               <tr>
                                  <td>
                                      <div class="form-group">
                                            <label for="post_date">User First Name</label>
                                            <h2><?php echo $_SESSION['user_first_name']; ?></h2>
                                        </div>
                                  </td>
                                  <td>
                                      <div class="form-group">
                                            <label for="post_date">User Last Name</label>
                                            <h2><?php echo $_SESSION['user_last_name']; ?></h2>
                                        </div>
                                  </td> 
                               </tr>
                               <tr>
                                  <td>
                                      <div class="form-group">
                                            <label for="post_content">User Email</label>
                                            <h2><?php echo $_SESSION['user_email']; ?></h2>
                                        </div>
                                  </td>
                                  <td>
                                      <div class="form-group">
                                            <label for="post_content">User Role</label>
                                            <h2><?php echo $_SESSION['user_role']; ?></h2>
                                        </div>
                                  </td> 
                               </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a href="update_profile.php"><input class="btn btn-primary" type="submit" name="update_profile" value="update profile"></a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>