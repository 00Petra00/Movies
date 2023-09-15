<?php
session_start();
include 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New movie</title>
    <link rel="shortcut icon" href="../Pictures/logo.png">
    <link rel="stylesheet" href="../style.css"/>
    <script defer src="add.js"></script>
</head>
<body>
<section class="bg3">
  <form id="addform" method="POST" enctype="multipart/form-data">
  <div class="box">
    <h2 class="title">Add new favorite</h2>
    <?php if (isset($_GET['error'])){ ?>
        <div id="error"> <?php echo $_GET['error']; ?> </div>
    <?php } ?>
    <div id="error"></div>
    <div class="inputBox">
      <input type="file" required="required" name="image" id="image" accept="image/*">
      <span> Image: </span>
    </div>
    <div class="inputBox">
      <input type="text" required="required"  name="name" id="name" placeholder="Name">
      <span> Name: </span>
    </div>
    <div class="inputBox">
      <input type="text" required="required" id="author" name="author" placeholder="Author">
      <span> Author: </span>
    </div>
    <div class="inputBox">
      <input type="number" required="required" min="1900" max="2023" value="2023" id="date" name="date" placeholder="Date">
      <span> Date: </span>
    </div>
    <div class="button">
      <input  value="Back" onclick="window.location.href = 'index.php'"/>
      <input type="submit" value="Add"/>
    </div>
  </div>

  </form>

     <?php
     if(isset($_FILES['image']) && $_FILES['image']['error'] == 4){
     header(("Location: newmovie.php?error=Image does dot exist"));
     exit();
     }
     if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
           $fileName = $_FILES['image']['name'];
           $fileSize = $_FILES['image']['size'];
           $tmpName = $_FILES['image']['tmp_name'];

           $validExtension = ['jpg', 'jpeg', 'png'];
           $imageExtension = explode('.', $fileName);
           $imageExtension = strtolower(end($imageExtension));

           if(!in_array($imageExtension, $validExtension)){
            header(("Location: newmovie.php?error=Invalid image extension"));
            exit();
           }
           else{
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, '../Pictures/' . $newImageName);
            $image = $newImageName;


     if (isset($_POST['name']) && isset($_POST['author']) && isset($_POST['date']) ) {
      $name=$_POST['name'];
      $author=$_POST['author'];
      $year=$_POST['date'];
      $username = $_SESSION['username'];
      $sql= "INSERT INTO movie(image, name, author, year) VALUES ('$image', '$name', '$author', '$year')";
      $result= mysqli_query($conn, $sql);
      $sql2= "INSERT INTO favorite(username, name, author) VALUES ('$username', '$name', '$author')";
      $result2= mysqli_query($conn, $sql2);

      header(("Location: index.php"));
      }
      }
      }
      ?>
</section>
</body>
</html>