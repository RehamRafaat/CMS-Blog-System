<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Auther</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In Response To</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                    $query = "select * from comments";
                                    $comment_view_query = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($comment_view_query))
                                    {
                                        $comment_id = $row['comment_id'];
                                        $comment_post_id = $row['comment_post_id'];
                                        $comment_auther = $row['comment_auther'];
                                        $comment_content = $row['comment_content'];
                                        $comment_email = $row['comment_email'];
                                        $comment_status = $row['comment_status'];
                                        $comment_date = $row['comment_date'];
                                        
                                        echo "<tr>";
                                        echo "<td>{$comment_id}</td>";
                                        echo "<td>{$comment_auther}</td>";
                                        echo "<td>{$comment_content}</td>";
                                        echo "<td>{$comment_email}</td>";
                                        echo "<td>{$comment_status}</td>";
                                        
                                        
                                        $quer = "select * from posts where post_id = $comment_post_id";
                                        $select_post_id_query = mysqli_query($conn, $quer);
                                        while($row = mysqli_fetch_assoc($select_post_id_query))
                                        {
                                            $post_id = $row['post_id'];
                                            $post_title = $row['post_title'];
                                            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                                        }
                                        
                                        echo "<td>{$comment_date}</td>";
                                        echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
                                        echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
                                        echo "<td><a href='comments.php?source=edit_comment&p_id='>Edit</a></td>";
                                        echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
                                        echo "</tr>";
                                    } 

                                ?>
                                <?php
                                    if(isset($_GET['unapprove']))
                                    {
                                        $the_comment_id = $_GET['unapprove'];
                                        $que = "update comments set comment_status = 'unapproved' where comment_id = {$the_comment_id}";
                                        $res = mysqli_query($conn,$que);
                                        header("Location: comments.php");
                                    }
                                    if(isset($_GET['approve']))
                                    {
                                        $the_comment_id = $_GET['approve'];
                                        $que = "update comments set comment_status = 'approved' where comment_id = {$the_comment_id}";
                                        $res = mysqli_query($conn,$que);
                                        header("Location: comments.php");
                                    }
                                
                                    if(isset($_GET['delete']))
                                    {
                                        $the_comment_id = $_GET['delete'];
                                        $que = "delete from comments where comment_id = {$the_comment_id}";
                                        $res = mysqli_query($conn,$que);
                                        header("Location: comments.php");
                                    }
                                ?>
                            </tbody>
                        </table>