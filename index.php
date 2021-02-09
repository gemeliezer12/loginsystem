
    <?php
    include "header.php";
    if(!isset($_SESSION["idUsers"])){
        ?>
        <main>
            <div class="login-container container">
                <p class="title">Login</p>
                <form class="login-form" action="inc/login.inc.php" method="POST" autocomplete="off">
                    <input type="text" name="mailuid" placeholder="Email/Password">
                    <input type="password" name="pwd" placeholder="Password">
                    <input class="login-btn" type="submit" name="login-submit" value="Login">
                </form>
            </div>
        </main>
        <?php
    }
    ?>
</body>
</html>