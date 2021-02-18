<?php
include "dbh.inc.php";
if(isset($_POST["signup-submit"])){
    $username = $_POST["uid"];
    $email = $_POST["mail"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];
    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email."");
        exit();
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../signup.php?error=invalidmailuid");
        exit();
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmail&uid=".$username."");
        exit();
    }
    elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../signup.php?error=invaliduid&mail=".$email."");
        exit();
    }
    elseif($password !== $passwordRepeat){
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email."");
        exit();
    }
    else{
        $query = $pdo->prepare("SELECT uidUsers FROM users WHERE uidusers=?;");
        $query->bindValue(1, $username);
        $query->execute();
        if($query->rowCount() > 0){
            header("Location: ../signup.php?error=usertaken&mail=".$email."");
            exit();
        }
        else{
            $query = $pdo->prepare("INSERT INTO users(uidUsers, emailUsers, pwdUsers) VALUES(?, ?, ?);");
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            $query->bindValue(1, $username);
            $query->bindValue(2, $email);
            $query->bindValue(3, $hashedPwd);

            $query->execute();

            $query = $pdo->prepare("SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;");
            $query->bindValue(1, $username);
            $query->bindValue(2, $email);
            $query->execute();

            $rowCount = $query->rowCount();

            if($rowCount > 0){
                $row = $query->fetch();

                session_start();
                $_SESSION["idUsers"] = $row["idUsers"];
                $_SESSION["uidUsers"] = $row["uidUsers"];

                
                $query = $pdo->prepare("INSERT INTO profiles(idUsers, uidUsers) VALUES(?, ?)");
                $query->bindValue(1, $_SESSION["idUsers"]);
                $query->bindValue(2, $_SESSION["uidUsers"]);
                $query->execute();

                header("Location: ../edit-profile.php?login=success");
                exit();
            }

            header("Location: ../signup.php?signup=success");
            exit();
        }
    }
}