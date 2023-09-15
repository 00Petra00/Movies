<?php
session_start();
    include 'connect.php';
    $username=$_SESSION['username'];

    if(isset($_POST['delete'])){
        $name=$_POST['delete'];

        $sql="DELETE FROM favorite WHERE name='$name' AND username='$username' LIMIT 1";
        $result=mysqli_query($conn,$sql);

        if($result){
            header(("Location: index.php?success=The movie has been deleted"));
            exit();
        } else{
            header(("Location: index.php?error=Failed to delete movie"));
            exit();
        }

    }


?>