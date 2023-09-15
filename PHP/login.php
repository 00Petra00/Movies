<?php
session_start();
include 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="shortcut icon" href="Pictures/logo.png">
    <link rel="stylesheet" href="style.css"/>
    <script defer src="login.js"></script>
</head>
<body>
<section class="bg2">
    <img id="bg" src="Pictures/hatter.jpg" alt="Background" title="Background">
    <form id="loginform" method="POST">
    <div class="box">
        <h2 class="title">Sign In</h2>
        <?php if (isset($_GET['error'])){ ?>
                    <div id="error"> <?php echo $_GET['error']; ?> </div>
        <?php } ?>
        <div id="error"></div>
        <div class="inputBox">
            <input type="text" required="required"  name="username" id="username" placeholder="Username">
            <span> Username: </span>
        </div>
        <div class="inputBox">
            <input type="password" required="required"  id="password" name="password" placeholder="Password">
            <span> Password: </span>
        </div>
        <div class="button">
            <input type="submit" value="Sign In"/>
        </div>
    </div>
    </form>

    <?php
    if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

     $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['username'] === $username && $row['password'] === $password) {
                    $_SESSION['username'] = $row['username'];
                    header(("Location: index.php"));
                    exit();
                } else {
                    header(("Location: login.php?error=Incorrect username or password"));
                    exit();
                }
            } else {
                header(("Location: login.php?error=Incorrect username or password"));
                exit();
            }
        }
    ?>
</section>
</body>
</html>