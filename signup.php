<?php
include "inc/dbh.inc.php";
include "inc/signup.inc.php";
include "header.php";

if(isset($_SESSION["idUsers"])){
    header("Location: index.php");
}
?>
    <main>
        <div class="signup-container container">
            <p class="title">Signup</p>
            <form class="signup-form" action="inc/signup.inc.php" method="POST" autocomplete="off">
                <input type="text" name="uid" placeholder="Username">
                <input type="text" name="mail" placeholder="Email">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwd-repeat" placeholder="Repeat Password">
                <input class="signup-btn" type="submit" name="signup-submit" value="Signup">
            </form>
        </div> 
    </main>
</body>
</html>