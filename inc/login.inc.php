<?php
include "dbh.inc.php";
if(isset($_POST["login-submit"])){
    $emailUsername = $_POST["mailuid"];
    $password = $_POST["pwd"];
    if(empty($emailUsername) || empty($password)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else{
        $query = $pdo->prepare("SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query->bindValue(1, $emailUsername);
        $query->bindValue(2, $emailUsername);

        $query->execute();

        $rowCount = $query->rowCount();

        if($rowCount > 0){
            $row = $query->fetch();
            $pwdCheck = password_verify($password, $row["pwdUsers"]);
            
            if($pwdCheck == false){
                header("Location: ../index.php?error=wrongpwd");
                exit();
            }
            elseif($pwdCheck == true){
                session_start();
                $_SESSION["idUsers"] = $row["idUsers"];
                $_SESSION["uidUsers"] = $row["uidUsers"];
                header("Location: ../index.php?login=success");
                exit();
            }
            else{
                header("Location: ../index.php?error=wrongpwd");
                exit();
            }
        }
        else{
            header("Location: ../index.php?error=nouser");
            exit();
        }
    }
}