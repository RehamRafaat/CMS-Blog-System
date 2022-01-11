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
                            <small>Auther</small>
                        </h1>
                        
                            <div class="col-xs-6">
                              
                               <?php  insert_categories();  ?>
                               
                                <form action="" method="post">
                                   <label for="cat_title">Add Category</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="cat_title">
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                    </div>
                                </form>
                                
                                
                                <?php update_categories(); ?>
                                
                            </div>
                            <div class="col-xs-6">
                               <table class="table table-bordered table-hover">
                                   <thead>
                                       <tr>
                                           <th>ID</th>
                                           <th>Category Title</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                      <?php find_all_categories(); ?>
                                       
                                      <?php  delete_categories();  ?>
                                   </tbody>
                               </table>
                            </div>
            
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>