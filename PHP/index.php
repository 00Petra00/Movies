<?php
session_start();
include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My favorite movies</title>
    <link rel="shortcut icon" href="Pictures/logo.png">
    <link rel="stylesheet" href="style.css"/>
    <script defer src="list.js"></script>
</head>

<body>
<nav>
    <div class="button">
        <h1>My favorite movies</h1>
        <input value="Sign Out" onclick="window.location.href = 'logout.php'"/>
    </div>
</nav>
<section class="bg3">
    <div id="grid" class="list">
    <?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    $query = "SELECT image, movie.name, movie.author, year
              FROM movie, favorite, user
              WHERE movie.name = favorite.name AND movie.author = favorite.author AND user.username = favorite.username AND user.username = '$username'";

    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)){
        $name=$row["name"];
    ?>
        <div class="pos">
            <img src="Pictures/<?php echo $row['image'] ?>" alt="Kép sikertelen betöltése">
            <div class="tbox">
                <div class="ttext" > <?php echo $row['author'] ?> </div>
                <div class="ttext" > <?php echo $row['year'] ?> </div>
            </div>

            <div class="b">
                <form action="delete.php" method="post">
                    <p ><button class="deletebutton" type="submit" name="delete" value="<?=$name; ?>"> </button></p>
                </form>
                <div class="text"> <?php echo $row['name'] ?> </div>
            </div>
        </div>

    <?php
//     }
    }
    }
    }
    ?>

    </div>
    <div class="button">
            <input value="New favorite" onclick="window.location.href = 'newmovie.php'"/>
    </div>
</section>
</body>
</html>