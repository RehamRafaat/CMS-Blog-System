<?php

///// categories page modules //////

function insert_categories()
{
    global $conn;
    
     if(isset($_POST['submit']))
    {
        $cat_title = $_POST['cat_title'];
        if($cat_title == "" || empty($cat_title))
        {
            echo "<p style='color:red;'>this feild shouldn't be empty</p>";
        }
        else
        {
            $query = "insert into categories(cat_title) value('{$cat_title}')";
            $category_insert_query = mysqli_query($conn,$query);
            if(!$category_insert_query)
            {
                die('query faild'.mysqli_error($conn));
            }
        }
    }
}

function find_all_categories()
{
    global $conn;
    
     $query2 = "select * from categories";
    $category_view_query = mysqli_query($conn,$query2);
    while($row = mysqli_fetch_assoc($category_view_query))
    {
        $cat_id = $row['cat_id']; 
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }  
}
function delete_categories()
{
    global $conn;
    
     if(isset($_GET['delete']))
       {
           $cat_idd = $_GET['delete'];
           $que = "delete from categories where cat_id = {$cat_idd}";
           mysqli_query($conn,$que);
           header("Location: categories.php");
       }
                                       
}
function update_categories()
{
    global $conn;
    
     if(isset($_GET['edit']))
    {
        $cat_idd = $_GET['edit'];
        include "includes/edit_category.php";
    }

                                       
}
function confirm_query($res)
{
    global $conn;
    if(!$res)
    {
        die("query failed".mysqli_error($conn));
    }
    
}
?>