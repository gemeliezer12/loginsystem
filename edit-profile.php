<?php
include "header.php";
?>

<main>
    <form class="container edit-profile" action="inc/edit-profile.inc.php" method="POST">
        <div class="cover">
        </div>
        <div class="info">
            <div class="picture">
                <input id="upload-image" name="image" type="file">
                <img id="uploaded-image" src="uploads/default.png" alt="">
            </div>
            <div class="input">
                <label for="uid">Username</label>
                <input type="text" name="uid" value="<?php echo $data2["uidUsers"]?>">
            </div>
            <div class="input">
                <label for="bio">Bio</label>
                <textarea name="bio"><?php echo $data2["bioProfiles"];?></textarea>
            </div>
            <div class="edit-submit">
                <p>Edit Profile</p>
                <input type="submit" name="edit-profile-submit" value="Save">
            </div>
        </div>
        
    </form>
    
</main>
 
</body>
</html>