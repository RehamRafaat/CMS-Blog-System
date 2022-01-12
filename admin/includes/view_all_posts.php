<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Auther</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Content</th>
                                    <th>Status</th>
                                    <th>Images</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                    $query = "select * from posts";
                                    $posts_view_query = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($posts_view_query))
                                    {
                                        $post_id = $row['post_id']; 
                                        $post_auther = $row['post_auther'];
                                        $post_title = $row['post_title'];
                                        $post_category = $row['post_category_id'];
                                        $post_status = $row['post_status'];
                                        $post_image = $row['post_image'];
                                        $post_tags = $row['post_tags'];
                                        $post_comments = $row['post_comment_count'];
                                        $post_date = $row['post_date'];
                                        $post_content = $row['post_content'];
                                        echo "<tr>";
                                        echo "<td>{$post_id}</td>";
                                        echo "<td>{$post_auther}</td>";
                                        echo "<td>{$post_title}</td>";
                                        
                                        $query2 = "select * from categories where cat_id = {$post_category}";
                                        $select_category = mysqli_query($conn,$query2);
                                        confirm_query($select_category);
                                        while($row = mysqli_fetch_assoc($select_category))
                                        {
                                            $cat_id = $row['cat_id']; 
                                            $cat_title = $row['cat_title'];
                                            echo "<td>{$cat_title}</td>";
                                        }
                                        
                                        echo "<td>{$post_content}</td>";
                                        echo "<td>{$post_status}</td>";
                                        echo "<td><img class='img-responsive' width='100' src='../images/posts/{$post_image}'></td>";
                                        echo "<td>{$post_tags}</td>";
                                        echo "<td>{$post_comments}</td>";
                                        echo "<td>{$post_date}</td>";
                                        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                                        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                                        echo "</tr>";
                                    } 

                                ?>
                                <?php
                                    if(isset($_GET['delete']))
                                    {
                                        $the_post_id = $_GET['delete'];
                                        $que = "delete from posts where post_id = {$the_post_id}";
                                        $res = mysqli_query($conn,$que);
                                        header("Location: posts.php");
                                        
                                    }
                                ?>
                            </tbody>
                        </table>