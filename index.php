<?php
session_start();
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="style.css"/>
    <script defer src="list.js"></script>
</head>

<body>
<nav>
    <div class="button">
        <h1>Movies</h1>
        <input value="Sign Out"/>
    </div>
</nav>
<section class="bg3">
    <div id="grid" class="list">
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $image=$_POST['image'];
      $name=$_POST['name'];
      $author=$_POST['author'];
      $year=$_POST['date'];
      $sql= "INSERT INTO movie(image, name, author, year) VALUES ('$image', '$name', '$author', '$year')";
      $result2= mysqli_query($conn, $sql);}
      ?>
    <?php
    $query = "SELECT * FROM movie";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)){

    ?>
        <div class="pos">
            <img src="Pictures/<?php echo $row["image"];?>" alt="Kép sikertelen betöltése">
            <div class="tbox">
                <div class="ttext" > <?php echo $row["author"]; ?> </div>
                <div class="ttext" > <?php echo $row["year"]; ?> </div>
            </div>

            <div class="b">
                <img src="Pictures/trashcan.png" alt="Delete">
                <div class="text"> <?php echo $row["name"]; ?> </div>
            </div>
        </div>
    <?php
    }
    }
    ?>
    <div class="button">
        <input value="New favorite" onclick="window.location.href = 'newmovie.php'"/>
    </div>
</section>
</body>
</html>