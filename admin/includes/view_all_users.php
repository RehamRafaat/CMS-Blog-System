<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Image</th>
                                    <th>Role</th>
                                    <th>Randsalt</th>
                                    <th>Make Admin</th>
                                    <th>Make Subsrciber</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                    $query = "select * from users";
                                    $users_view_query = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($users_view_query))
                                    {
                                        $user_id = $row['user_id'];
                                        $user_name = $row['user_name'];
                                        $user_password = $row['user_password'];
                                        $user_first_name = $row['user_first_name'];
                                        $user_last_name = $row['user_last_name'];
                                        $user_email = $row['user_email'];
                                        $user_image = $row['user_image'];
                                        $user_role = $row['user_role'];
                                        $user_randsalt = $row['user_randsalt'];
                                        
                                        echo "<tr>";
                                        echo "<td>{$user_id}</td>";
                                        echo "<td>{$user_name}</td>";
                                        echo "<td>{$user_password}</td>";
                                        echo "<td>{$user_first_name}</td>";
                                        echo "<td>{$user_last_name}</td>";
                                        echo "<td>{$user_email}</td>";
                                        echo "<td></td>";
                                        echo "<td><img class='img-responsive' width='100' src='../images/users/{$user_image}'></td>";
                                        echo "<td>{$user_role}</td>";
                                        echo "<td>{$user_randsalt}</td>";
                                         echo "<td><a href='users.php?change_to_admin=$user_id'>Confirm</a></td>";
                                        echo "<td><a href='users.php?change_to_sub=$user_id'>Confirm</a></td>";
                                        echo "<td><a href='users.php?source=edit_user&u_id=$user_id'>Edit</a></td>";
                                        echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
                                        echo "</tr>";
                                    } 

                                ?>
                                <?php
                                
                                    if(isset($_GET['change_to_admin']))
                                    {
                                        $the_user_id = $_GET['change_to_admin'];
                                        $que = "update users set user_role = 'admin' where user_id = {$the_user_id}";
                                        $res = mysqli_query($conn,$que);
                                        header("Location: users.php");
                                    }
                                    if(isset($_GET['change_to_sub']))
                                    {
                                        $the_user_id = $_GET['change_to_sub'];
                                        $que = "update users set user_role = 'subscriber' where user_id = {$the_user_id}";
                                        $res = mysqli_query($conn,$que);
                                        header("Location: users.php");
                                    }
                                
                                    if(isset($_GET['delete']))
                                    {
                                        $the_user_id = $_GET['delete'];
                                        $que = "delete from users where user_id = {$the_user_id}";
                                        mysqli_query($conn,$que);
                                        header("Location: users.php");
                                    }
                                ?>
                            </tbody>
                        </table>