<?php
session_start();
include "inc/dbh.inc.php";
include "class/user.class.php";

$user = new User;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <script defer src="js/profile.js"></script>
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="container">
            <p class="logo">
                Login Form
            </p>
            <?php
            if(isset($_SESSION["idUsers"])){
                $id = $_SESSION["idUsers"];
                $data = $user->fetchData($id);
                ?>
                <button class="profile">
                    <div class="label">
                        <img class="picture" src="uploads/default.png" alt="">
                        <p><?php echo $data["uidUsers"]?></p>
                    </div>
                    <i class="fas fa-caret-down fa-2x"></i>
                    <div class="options hide">
                        <div>
                            <a href="edit.php">Edit Profile</a>
                        </div>
                        <form action="inc/logout.inc.php">
                            <input type="submit" name="logout-submit" value="Logout">
                        </form>
                    </div>

                </button>
                <?php
            }
            else{
                ?>
                <div class="log-sign">
                    <a class="log-link" href="index.php">Login</a>
                    <a class="sign-link" href="signup.php">Signup</a>
                </div>
                <?php
            }
            ?>
        </div>
    </nav>